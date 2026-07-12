import * as React from 'react';
import { BlogCard } from './BlogCard';

export interface BlogPost {
  title: string;
  excerpt: string;
  image: string;
  link: string;
  read_time?: number;
  category?: string | null;
  tags?: string[] | null;
}

function prettyCategory(cat?: string | null): string {
  if (!cat) return 'Insights';
  return cat.replace(/-/g, ' ').replace(/\b\w/g, (c) => c.toUpperCase());
}

export default function BlogGrid({ posts }: { posts: BlogPost[] }) {
  return (
    <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 justify-items-center">
      {posts.map((p) => (
        <BlogCard
          key={p.link}
          href={p.link}
          imageUrl={p.image}
          title={p.title}
          subtitle={prettyCategory(p.category)}
          description={p.excerpt}
          highlights={p.tags || []}
          meta={p.read_time ? `${p.read_time} min read` : undefined}
        />
      ))}
    </div>
  );
}
