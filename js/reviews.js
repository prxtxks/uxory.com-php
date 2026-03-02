document.addEventListener('DOMContentLoaded', () => {
  const STAR_SVG_FILLED = '<svg class="w-5 h-5" viewBox="0 0 20 20"><path fill="#12D8CC" d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>';
  const STAR_SVG_EMPTY = '<svg class="w-5 h-5" viewBox="0 0 20 20"><path fill="none" stroke="#12D8CC" stroke-width="1.5" d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>';
  const STAR_SVG_FILLED_SM = '<svg class="w-4 h-4" viewBox="0 0 20 20"><path fill="#12D8CC" d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>';
  const STAR_SVG_EMPTY_SM = '<svg class="w-4 h-4" viewBox="0 0 20 20"><path fill="none" stroke="#12D8CC" stroke-width="1.5" d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>';

  let allReviews = [];
  let currentSort = 'newest';
  let selectedRating = 0;
  let captchaRequired = false;
  let captchaWidgetId = null;

  // ─── Delete Token Storage ─────────────────────────

  function getDeleteTokens() {
    try {
      return JSON.parse(localStorage.getItem('uxory_review_tokens') || '{}');
    } catch { return {}; }
  }

  function saveDeleteToken(reviewId, token) {
    const tokens = getDeleteTokens();
    tokens[reviewId] = token;
    localStorage.setItem('uxory_review_tokens', JSON.stringify(tokens));
  }

  function removeDeleteToken(reviewId) {
    const tokens = getDeleteTokens();
    delete tokens[reviewId];
    localStorage.setItem('uxory_review_tokens', JSON.stringify(tokens));
  }

  function ownsReview(reviewId) {
    return !!getDeleteTokens()[reviewId];
  }

  // ─── Utility Functions ──────────────────────────

  function getInitials(name) {
    return name.split(' ').map(w => w[0]).join('').toUpperCase().slice(0, 2);
  }

  function timeAgo(dateStr) {
    const now = new Date();
    const date = new Date(dateStr);
    const seconds = Math.floor((now - date) / 1000);

    if (seconds < 60) return 'just now';
    const minutes = Math.floor(seconds / 60);
    if (minutes < 60) return minutes + (minutes === 1 ? ' min ago' : ' mins ago');
    const hours = Math.floor(minutes / 60);
    if (hours < 24) return hours + (hours === 1 ? ' hour ago' : ' hours ago');
    const days = Math.floor(hours / 24);
    if (days < 30) return days + (days === 1 ? ' day ago' : ' days ago');
    const months = Math.floor(days / 30);
    if (months < 12) return months + (months === 1 ? ' month ago' : ' months ago');
    const years = Math.floor(months / 12);
    return years + (years === 1 ? ' year ago' : ' years ago');
  }

  function renderStars(rating, small) {
    const filled = small ? STAR_SVG_FILLED_SM : STAR_SVG_FILLED;
    const empty = small ? STAR_SVG_EMPTY_SM : STAR_SVG_EMPTY;
    let html = '';
    for (let i = 1; i <= 5; i++) {
      html += i <= rating ? filled : empty;
    }
    return html;
  }

  function escapeHtml(str) {
    const div = document.createElement('div');
    div.textContent = str;
    return div.innerHTML;
  }

  // ─── Stats Bar ──────────────────────────────────

  function updateStats(stats) {
    const avgEl = document.getElementById('stats-avg-number');
    const starsEl = document.getElementById('stats-avg-stars');
    const totalEl = document.getElementById('stats-total');

    if (stats.total === 0) {
      avgEl.textContent = '—';
      starsEl.innerHTML = renderStars(0, false);
      totalEl.textContent = '0';
      return;
    }

    avgEl.textContent = stats.average_rating;
    starsEl.innerHTML = renderStars(Math.round(stats.average_rating), false);
    totalEl.textContent = stats.total;
  }

  // ─── Star Rating Input ──────────────────────────

  function initStarRatingInput() {
    const container = document.getElementById('star-rating-input');
    const hiddenInput = document.getElementById('review-rating');
    if (!container) return;

    for (let i = 1; i <= 5; i++) {
      const btn = document.createElement('button');
      btn.type = 'button';
      btn.setAttribute('data-value', i);
      btn.setAttribute('aria-label', i + ' star' + (i > 1 ? 's' : ''));
      btn.innerHTML = STAR_SVG_EMPTY;
      btn.className = 'star-btn p-0.5';

      btn.addEventListener('mouseenter', () => {
        container.querySelectorAll('.star-btn').forEach((s, idx) => {
          s.innerHTML = idx < i ? STAR_SVG_FILLED : STAR_SVG_EMPTY;
        });
      });

      btn.addEventListener('click', () => {
        selectedRating = i;
        hiddenInput.value = i;
        container.querySelectorAll('.star-btn').forEach((s, idx) => {
          s.innerHTML = idx < i ? STAR_SVG_FILLED : STAR_SVG_EMPTY;
        });
      });

      container.appendChild(btn);
    }

    container.addEventListener('mouseleave', () => {
      container.querySelectorAll('.star-btn').forEach((s, idx) => {
        s.innerHTML = idx < selectedRating ? STAR_SVG_FILLED : STAR_SVG_EMPTY;
      });
    });
  }

  // ─── Review Card Rendering ──────────────────────

  function renderReviewCard(review) {
    const replies = review.review_replies || [];
    const replyCount = replies.length;
    const initials = getInitials(review.author_name);
    const companyHtml = review.company_name
      ? `<span class="text-secondary/40 dark:text-backgroundBody/40 mx-1.5">·</span><span class="text-secondary/50 dark:text-backgroundBody/50">${escapeHtml(review.company_name)}</span>`
      : '';

    let repliesHtml = '';
    replies.forEach(reply => {
      const replyInitials = getInitials(reply.author_name);
      const replyCompanyHtml = reply.company_name
        ? `<span class="text-secondary/40 dark:text-backgroundBody/40 mx-1">·</span><span class="text-secondary/50 dark:text-backgroundBody/50 text-xs">${escapeHtml(reply.company_name)}</span>`
        : '';

      repliesHtml += `
        <div class="flex gap-3 py-3 border-t dark:border-dark">
          <div class="reply-avatar flex-none w-8 h-8 bg-secondary/10 dark:bg-backgroundBody/10 flex items-center justify-center text-xs font-bold text-secondary dark:text-backgroundBody">
            ${replyInitials}
          </div>
          <div class="flex-1 min-w-0">
            <div class="flex flex-wrap items-center gap-y-1 text-sm">
              <span class="font-medium">${escapeHtml(reply.author_name)}</span>
              ${replyCompanyHtml}
              <span class="text-secondary/40 dark:text-backgroundBody/40 mx-1.5">·</span>
              <span class="text-secondary/40 dark:text-backgroundBody/40 text-xs">${timeAgo(reply.created_at)}</span>
            </div>
            <p class="mt-1 text-sm text-secondary/80 dark:text-backgroundBody/70 leading-relaxed">${escapeHtml(reply.reply_text)}</p>
          </div>
        </div>
      `;
    });

    return `
      <article class="review-card border dark:border-dark p-6 md:p-8" data-review-id="${review.id}">
        <!-- Header -->
        <div class="flex items-start gap-4 mb-4">
          <div class="review-avatar flex-none w-11 h-11 bg-primary flex items-center justify-center text-sm font-bold text-black">
            ${initials}
          </div>
          <div class="flex-1 min-w-0">
            <div class="flex flex-wrap items-center gap-y-1">
              <span class="font-medium text-lg">${escapeHtml(review.author_name)}</span>
              ${companyHtml}
            </div>
            <div class="flex items-center gap-2 mt-1">
              <div class="flex gap-0.5">${renderStars(review.rating, true)}</div>
              <span class="text-secondary/40 dark:text-backgroundBody/40 text-xs">${timeAgo(review.created_at)}</span>
            </div>
          </div>
        </div>

        <!-- Body -->
        <p class="text-secondary/80 dark:text-backgroundBody/70 leading-relaxed mb-5">${escapeHtml(review.review_text)}</p>

        <!-- Actions -->
        <div class="flex items-center gap-4">
          <button class="reply-toggle-btn flex items-center gap-2 text-sm text-secondary/50 dark:text-backgroundBody/50 hover:text-primary transition-colors duration-200" data-review-id="${review.id}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z" />
            </svg>
            <span>${replyCount} ${replyCount === 1 ? 'reply' : 'replies'}</span>
          </button>
          ${ownsReview(review.id) ? `
          <button class="delete-review-btn flex items-center gap-1.5 text-sm text-red-400 hover:text-red-500 transition-colors duration-200 ml-auto" data-review-id="${review.id}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
            </svg>
            <span>Delete</span>
          </button>
          ` : ''}
        </div>

        <!-- Reply Thread (collapsed) -->
        <div class="reply-thread mt-4" id="thread-${review.id}">
          <div class="pl-0 md:pl-4 border-l-0 md:border-l-2 md:border-primary/20 md:dark:border-primary/10 ml-0 md:ml-5">
            ${repliesHtml}

            <!-- Reply Form -->
            <div class="pt-4 border-t dark:border-dark">
              <form class="reply-form" data-review-id="${review.id}">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-3">
                  <input
                    required
                    type="text"
                    name="author_name"
                    maxlength="100"
                    placeholder="Your name *"
                    class="reply-input py-2 pl-3 bg-backgroundBody dark:bg-dark focus:outline-none focus:border-primary border dark:border-dark w-full text-colorText dark:text-backgroundBody/70 text-sm"
                  />
                  <input
                    type="text"
                    name="company_name"
                    maxlength="100"
                    placeholder="Company (optional)"
                    class="reply-input py-2 pl-3 bg-backgroundBody dark:bg-dark focus:outline-none focus:border-primary border dark:border-dark w-full text-colorText dark:text-backgroundBody/70 text-sm"
                  />
                </div>
                <textarea
                  required
                  name="reply_text"
                  maxlength="1000"
                  rows="2"
                  placeholder="Write a reply..."
                  class="reply-input py-2 pl-3 bg-backgroundBody dark:bg-dark focus:outline-none focus:border-primary border dark:border-dark w-full text-colorText dark:text-backgroundBody/70 text-sm resize-y mb-3"
                ></textarea>
                <div class="uxory-honeypot" aria-hidden="true">
                  <input type="text" name="website" tabindex="-1" autocomplete="off" />
                </div>
                <div class="reply-recaptcha-wrapper hidden mb-3"></div>
                <div class="flex items-center gap-3">
                  <button type="submit" class="reply-submit-btn text-sm px-5 py-2 bg-primary text-black font-medium hover:bg-primary/80 transition-colors duration-200">
                    Post Reply
                  </button>
                  <span class="reply-status text-sm font-medium"></span>
                </div>
              </form>
            </div>
          </div>
        </div>
      </article>
    `;
  }

  // ─── Render All Reviews ─────────────────────────

  function renderReviews(reviews) {
    const container = document.getElementById('reviews-container');
    const skeleton = document.getElementById('reviews-skeleton');
    const emptyState = document.getElementById('reviews-empty');

    if (skeleton) skeleton.remove();

    if (reviews.length === 0) {
      container.innerHTML = '';
      emptyState.classList.remove('hidden');
      return;
    }

    emptyState.classList.add('hidden');
    container.innerHTML = '<div class="space-y-6">' + reviews.map(renderReviewCard).join('') + '</div>';

    bindReplyToggles();
    bindReplyForms();
    bindDeleteButtons();
    animateCards();
  }

  // ─── Sorting ────────────────────────────────────

  function sortReviews(reviews, mode) {
    const sorted = [...reviews];
    switch (mode) {
      case 'newest':
        sorted.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));
        break;
      case 'highest':
        sorted.sort((a, b) => b.rating - a.rating || new Date(b.created_at) - new Date(a.created_at));
        break;
      case 'discussed':
        sorted.sort((a, b) => (b.review_replies || []).length - (a.review_replies || []).length || new Date(b.created_at) - new Date(a.created_at));
        break;
    }
    return sorted;
  }

  function initSortButtons() {
    document.querySelectorAll('.sort-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        document.querySelectorAll('.sort-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        currentSort = btn.dataset.sort;
        renderReviews(sortReviews(allReviews, currentSort));
      });
    });
  }

  // ─── Delete Review ─────────────────────────────

  function bindDeleteButtons() {
    document.querySelectorAll('.delete-review-btn').forEach(btn => {
      btn.addEventListener('click', async () => {
        const reviewId = btn.dataset.reviewId;
        if (!confirm('Are you sure you want to delete this review? This cannot be undone.')) return;

        const tokens = getDeleteTokens();
        const deleteToken = tokens[reviewId];
        if (!deleteToken) return;

        btn.disabled = true;
        btn.innerHTML = '<span class="text-xs">Deleting...</span>';

        const formData = new FormData();
        formData.append('review_id', reviewId);
        formData.append('delete_token', deleteToken);

        try {
          const res = await fetch('/php/delete-review', { method: 'POST', body: formData });
          const data = await res.json();

          if (data.status === 'success') {
            removeDeleteToken(reviewId);
            allReviews = allReviews.filter(r => r.id !== reviewId);
            recalcStats();
            renderReviews(sortReviews(allReviews, currentSort));
          } else {
            alert(data.message || 'Failed to delete review.');
            btn.disabled = false;
            btn.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg><span>Delete</span>';
          }
        } catch {
          alert('Something went wrong. Please try again.');
          btn.disabled = false;
        }
      });
    });
  }

  // ─── Reply Toggle ──────────────────────────────

  function bindReplyToggles() {
    document.querySelectorAll('.reply-toggle-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        const reviewId = btn.dataset.reviewId;
        const thread = document.getElementById('thread-' + reviewId);
        if (thread) {
          thread.classList.toggle('open');
        }
      });
    });
  }

  // ─── Reply Form Submissions ────────────────────

  function bindReplyForms() {
    document.querySelectorAll('.reply-form').forEach(form => {
      form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const reviewId = form.dataset.reviewId;
        const statusEl = form.querySelector('.reply-status');
        const submitBtn = form.querySelector('button[type="submit"]');

        statusEl.innerHTML = '<span class="text-secondary/50 dark:text-backgroundBody/50">Posting...</span>';
        submitBtn.disabled = true;

        const formData = new FormData(form);
        formData.append('review_id', reviewId);

        try {
          const res = await fetch('/php/post-reply', { method: 'POST', body: formData });
          const data = await res.json();

          if (data.status === 'captcha_required') {
            const captchaWrapper = form.querySelector('.reply-recaptcha-wrapper');
            captchaWrapper.classList.remove('hidden');
            if (!captchaWrapper.dataset.rendered) {
              if (typeof grecaptcha !== 'undefined' && grecaptcha.render) {
                grecaptcha.render(captchaWrapper, { sitekey: '6LeSajcsAAAAALS4VDz_NUpt7ZxXziL1q-GZuklX' });
                captchaWrapper.dataset.rendered = 'true';
              }
            }
            statusEl.innerHTML = '<span class="text-primary">Please complete the CAPTCHA, then submit again.</span>';
            submitBtn.disabled = false;
            return;
          }

          if (data.status === 'success') {
            statusEl.innerHTML = '<span class="text-green-500">' + escapeHtml(data.message) + '</span>';
            form.reset();

            const review = allReviews.find(r => r.id === reviewId);
            if (review && data.reply) {
              review.review_replies = review.review_replies || [];
              review.review_replies.push(data.reply);
            }

            renderReviews(sortReviews(allReviews, currentSort));

            const thread = document.getElementById('thread-' + reviewId);
            if (thread) thread.classList.add('open');
          } else {
            statusEl.innerHTML = '<span class="text-red-500">' + escapeHtml(data.message) + '</span>';
          }
        } catch (err) {
          statusEl.innerHTML = '<span class="text-red-500">Something went wrong. Please try again.</span>';
        }

        submitBtn.disabled = false;
      });
    });
  }

  // ─── GSAP Card Animation ──────────────────────

  function animateCards() {
    if (typeof gsap === 'undefined') return;
    const cards = document.querySelectorAll('.review-card');
    cards.forEach(card => {
      gsap.from(card, {
        scrollTrigger: {
          trigger: card,
          start: 'top 90%',
          end: 'top 60%',
          scrub: false,
        },
        opacity: 0,
        y: 40,
        filter: 'blur(6px)',
        duration: 0.6,
        ease: 'power2.out',
      });
    });
  }

  // ─── Toggle Review Form ────────────────────────

  function initToggleForm() {
    const toggleBtn = document.getElementById('toggle-review-form');
    const wrapper = document.getElementById('review-form-wrapper');
    if (!toggleBtn || !wrapper) return;

    toggleBtn.addEventListener('click', () => {
      wrapper.classList.toggle('open');
      if (wrapper.classList.contains('open')) {
        setTimeout(() => {
          wrapper.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }, 100);
      }
    });
  }

  // ─── Character Counter ─────────────────────────

  function initCharCounter() {
    const textarea = document.getElementById('review-text');
    const counter = document.getElementById('review-char-count');
    if (!textarea || !counter) return;

    textarea.addEventListener('input', () => {
      counter.textContent = textarea.value.length;
    });
  }

  // ─── Review Form Submission ────────────────────

  function initReviewForm() {
    const form = document.getElementById('reviewForm');
    const statusEl = document.getElementById('review-status');
    const submitBtn = document.getElementById('review-submit-btn');
    if (!form) return;

    form.addEventListener('submit', async (e) => {
      e.preventDefault();

      if (selectedRating === 0) {
        statusEl.innerHTML = '<span class="text-red-500">Please select a star rating.</span>';
        return;
      }

      statusEl.innerHTML = '<span class="text-secondary/50 dark:text-backgroundBody/50">Posting your review...</span>';
      submitBtn.disabled = true;

      const formData = new FormData(form);

      if (captchaRequired && captchaWidgetId !== null && typeof grecaptcha !== 'undefined') {
        const captchaResponse = grecaptcha.getResponse(captchaWidgetId);
        if (!captchaResponse) {
          statusEl.innerHTML = '<span class="text-red-500">Please complete the CAPTCHA.</span>';
          submitBtn.disabled = false;
          return;
        }
        formData.append('g-recaptcha-response', captchaResponse);
      }

      try {
        const res = await fetch('/php/post-review', { method: 'POST', body: formData });
        const data = await res.json();

        if (data.status === 'captcha_required') {
          captchaRequired = true;
          const wrapper = document.getElementById('review-recaptcha-wrapper');
          wrapper.classList.remove('hidden');
          if (captchaWidgetId === null && typeof grecaptcha !== 'undefined' && grecaptcha.render) {
            captchaWidgetId = grecaptcha.render('review-recaptcha', {
              sitekey: '6LeSajcsAAAAALS4VDz_NUpt7ZxXziL1q-GZuklX',
            });
          }
          statusEl.innerHTML = '<span class="text-primary">Please complete the CAPTCHA, then submit again.</span>';
          submitBtn.disabled = false;
          return;
        }

        if (data.status === 'success') {
          statusEl.innerHTML = '<span class="text-green-500">' + escapeHtml(data.message) + '</span>';

          if (data.review && data.delete_token) {
            saveDeleteToken(data.review.id, data.delete_token);
          }

          form.reset();
          selectedRating = 0;
          document.getElementById('review-char-count').textContent = '0';
          document.querySelectorAll('#star-rating-input .star-btn').forEach(s => {
            s.innerHTML = STAR_SVG_EMPTY;
          });

          if (data.review) {
            allReviews.unshift(data.review);
            recalcStats();
            renderReviews(sortReviews(allReviews, currentSort));
          }

          document.getElementById('review-form-wrapper').classList.remove('open');

          if (captchaRequired && captchaWidgetId !== null && typeof grecaptcha !== 'undefined') {
            grecaptcha.reset(captchaWidgetId);
          }
        } else {
          statusEl.innerHTML = '<span class="text-red-500">' + escapeHtml(data.message) + '</span>';
        }
      } catch (err) {
        statusEl.innerHTML = '<span class="text-red-500">Something went wrong. Please try again.</span>';
      }

      submitBtn.disabled = false;
    });
  }

  // ─── Recalculate Stats ─────────────────────────

  function recalcStats() {
    const total = allReviews.length;
    let avg = 0;
    if (total > 0) {
      const sum = allReviews.reduce((acc, r) => acc + r.rating, 0);
      avg = Math.round((sum / total) * 10) / 10;
    }
    updateStats({ total, average_rating: avg });
  }

  // ─── Load Reviews ─────────────────────────────

  async function loadReviews() {
    try {
      const res = await fetch('/php/get-reviews');
      const data = await res.json();

      if (data.status === 'success') {
        allReviews = data.reviews || [];
        updateStats(data.stats);
        renderReviews(sortReviews(allReviews, currentSort));
      } else {
        document.getElementById('reviews-skeleton')?.remove();
        document.getElementById('reviews-empty')?.classList.remove('hidden');
      }
    } catch (err) {
      document.getElementById('reviews-skeleton')?.remove();
      document.getElementById('reviews-empty')?.classList.remove('hidden');
    }
  }

  // ─── Initialize ────────────────────────────────

  initStarRatingInput();
  initToggleForm();
  initCharCounter();
  initReviewForm();
  initSortButtons();
  loadReviews();
});
