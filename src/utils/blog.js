// Simple frontmatter parser to avoid gray-matter/Buffer issues in browser
function parseFrontmatter(text) {
  const match = text.match(/^---\r?\n([\s\S]+?)\r?\n---\r?\n([\s\S]*)$/);
  const data = {};
  let content = text;

  if (match) {
    const yaml = match[1];
    content = match[2];
    yaml.split('\n').forEach(line => {
      const parts = line.split(':');
      if (parts.length >= 2) {
        const key = parts[0].trim();
        const value = parts.slice(1).join(':').trim().replace(/^['"](.*)['"]$/, '$1');
        data[key] = value;
      }
    });
  }
  return { data, content };
}

// This utility works in a Vite environment to load blog posts.
export async function getBlogPosts() {
  const posts = import.meta.glob('../content/blog/*.md', { query: '?raw', eager: true });
  
  return Object.entries(posts).map(([path, module]) => {
    const slug = path.split('/').pop().replace('.md', '');
    const rawContent = module.default || module;
    const { data } = parseFrontmatter(rawContent);
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
    
    const rawContent = posts[postPath].default || posts[postPath];
    const { data, content: body } = parseFrontmatter(rawContent);
    return {
      ...data,
      content: body,
    };
  } catch (error) {
    console.error('Error loading blog post:', error);
    return null;
  }
}
