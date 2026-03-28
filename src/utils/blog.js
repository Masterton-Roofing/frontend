import matter from 'gray-matter';

// This utility works in a Vite environment to load blog posts.
export async function getBlogPosts() {
  const posts = import.meta.glob('../content/blog/*.md', { query: '?raw', eager: true });
  
  return Object.entries(posts).map(([path, content]) => {
    const slug = path.split('/').pop().replace('.md', '');
    const { data } = matter(content.default || content);
    return {
      slug,
      ...data,
    };
  }).sort((a, b) => new Date(b.date) - new Date(a.date));
}

export async function getBlogPost(slug) {
  try {
    const posts = import.meta.glob('../content/blog/*.md', { query: '?raw', eager: true });
    const postPath = Object.keys(posts).find(path => path.endsWith(`${slug}.md`));
    
    if (!postPath) throw new Error('Post not found');
    
    const content = posts[postPath].default || posts[postPath];
    const { data, content: body } = matter(content);
    return {
      ...data,
      content: body,
    };
  } catch (error) {
    console.error('Error loading blog post:', error);
    return null;
  }
}
