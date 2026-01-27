<!-- Application Form Component -->
<!-- Usage: Set $positionTitle before including this component -->
<?php 
$positionTitle = $positionTitle ?? 'General Application';
?>

<div class="tab-content hidden" id="Apply">
  <form id="applicationForm" class="space-y-[30px] max-w-[770px] mx-auto">
    <!-- Hidden position field -->
    <input type="hidden" name="position" value="<?= htmlspecialchars($positionTitle) ?>" />

    <div class="w-full">
      <label for="name" class="text-2xl leading-[1.2] tracking-[-0.48px] text-[#000000b3] dark:text-dark-100">Full Name*</label>
      <input 
        type="text" 
        name="name" 
        placeholder="Enter Your Name" 
        required 
        class="py-4 pl-5 bg-backgroundBody dark:bg-dark focus:outline-none focus:border-primary border dark:border-dark w-full text-colorText dark:text-backgroundBody/70 placeholder:text-secondary/30 placeholder:dark:text-backgroundBody/30 text-xl leading-[1.4] tracking-[0.4px] mt-3" 
      />
    </div>

    <div class="w-full">
      <label for="email" class="text-2xl leading-[1.2] tracking-[-0.48px] text-[#000000b3] dark:text-dark-100">Email*</label>
      <input 
        type="email" 
        name="email" 
        placeholder="you@example.com" 
        required 
        class="py-4 pl-5 bg-backgroundBody dark:bg-dark focus:outline-none focus:border-primary border dark:border-dark w-full text-colorText dark:text-backgroundBody/70 placeholder:text-secondary/30 placeholder:dark:text-backgroundBody/30 text-xl leading-[1.4] tracking-[0.4px] mt-3" 
      />
    </div>

    <div class="w-full">
      <label for="resume" class="text-2xl leading-[1.2] tracking-[-0.48px] text-[#000000b3] dark:text-dark-100">Resume*</label>
      <div class="border border-secondary/10 dark:border-dark p-4 mt-3">
        <div class="flex justify-between items-center">
          <div class="flex flex-wrap items-center mx-auto gap-5">
            <label class="relative">
              <input 
                type="file" 
                name="resume" 
                accept=".pdf,.doc,.docx,.png,.jpg" 
                required 
                class="hidden" 
                onchange="document.getElementById('file-name').textContent = this.files[0] ? 'Selected: ' + this.files[0].name : ''" 
              />
              <figure class="inline-flex gap-2 px-6 py-3 rounded-full dark:bg-dark/10 border border-secondary/30 dark:border-backgroundBody/30 text-base text-secondary/70 dark:text-backgroundBody/70 hover:bg-gray-100 dark:hover:bg-dark-300 cursor-pointer transition-colors">
                <img src="/images/icons/file-upload.svg" class="inline-flex left-0 dark:hidden" alt="Upload" />
                <img src="/images/icons/file-upload-dark.svg" class="left-0 dark:inline hidden" alt="Upload" />
                <span>Upload File</span>
              </figure>
            </label>
            <h3 class="text-[21px] text-secondary/70 dark:text-backgroundBody/70 leading-7 tracking-[0.4px] mb-2">Or drag and drop here</h3>
          </div>
        </div>
        <div id="file-name" class="mt-2 text-sm text-primary dark:text-primary"></div>
        <p class="mt-2 text-sm text-secondary/50 dark:text-backgroundBody/50">Accepted: PDF, DOC, DOCX, PNG, JPG (Max 5MB)</p>
      </div>
    </div>

    <!-- reCAPTCHA -->
    <div id="application-recaptcha" class="g-recaptcha mt-4" data-sitekey="6LeSajcsAAAAALS4VDz_NUpt7ZxXziL1q-GZuklX"></div>

    <!-- Status Message -->
    <div id="applicationStatusMsg" class="text-base lg:text-lg font-medium"></div>

    <!-- Submit Button -->
    <div class="w-full">
      <button type="submit" class="bg-primary dark:bg-backgroundBody hover:bg-primary/30 cursor-pointer duration-300 dark:hover:bg-backgroundBody/90 text-secondary p-8 uppercase w-full font-medium">
        Submit Application
      </button>
    </div>
  </form>
</div>
