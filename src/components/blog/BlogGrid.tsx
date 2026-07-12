import * as React from 'react';
import { BlogCard } from './BlogCard';
import MobileBlogStack from './MobileBlogStack';

export interface BlogPost {
  title: string;
  excerpt: string;
  image: string;
  link: string;
  read_time?: number;
  category?: string | null;
  tags?: string[] | null;
}

export default function BlogGrid({ posts }: { posts: BlogPost[] }) {
  return (
    <>
      {/* Mobile: swipeable stacked deck */}
      <div className="sm:hidden">
        <MobileBlogStack posts={posts} />
      </div>

      {/* Desktop: tight 3-column grid (close to the original live layout) */}
      <div className="hidden sm:grid grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-10">
        {posts.map((p) => (
          <BlogCard
            key={p.link}
            href={p.link}
            imageUrl={p.image}
            title={p.title}
            category={p.category}
            description={p.excerpt}
            meta={p.read_time ? `${p.read_time} minute read` : undefined}
          />
        ))}
      </div>
    </>
  );
}
