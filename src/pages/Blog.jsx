import { useState, useEffect } from "react";
import { Link } from "react-router-dom";
import { getBlogPosts } from "../utils/blog";

export default function Blog() {
  const [posts, setPosts] = useState([]);

  useEffect(() => {
    async function loadPosts() {
      const data = await getBlogPosts();
      setPosts(data);
    }
    loadPosts();
  }, []);

  return (
    <div className="bg-white py-12">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="text-center">
          <h1 className="text-4xl font-bold text-gray-900 mb-4">Latest Blog Posts</h1>
          <p className="text-xl text-gray-600 mb-12">Insights and updates from Masterton Roofing Limited.</p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          {posts.map((post) => (
            <div key={post.slug} className="flex flex-col rounded-lg shadow-lg overflow-hidden border border-gray-100 transition hover:shadow-xl hover:-translate-y-1">
              <div className="flex-shrink-0 h-48 w-full bg-gray-200">
                {post.image ? (
                  <img className="h-full w-full object-cover" src={post.image} alt={post.title} />
                ) : (
                  <div className="h-full w-full flex items-center justify-center text-gray-400">
                    No image available
                  </div>
                )}
              </div>
              <div className="flex-1 bg-white p-6 flex flex-col justify-between">
                <div className="flex-1">
                  <p className="text-sm font-medium text-blue-600 mb-2">
                    {new Date(post.date).toLocaleDateString()}
                  </p>
                  <Link to={`/blog/${post.slug}`} className="block mt-2">
                    <p className="text-xl font-semibold text-gray-900">{post.title}</p>
                    <p className="mt-3 text-base text-gray-500 line-clamp-3">{post.excerpt}</p>
                  </Link>
                </div>
                <div className="mt-6 flex items-center">
                  <div className="flex-shrink-0">
                    <span className="sr-only">{post.author}</span>
                  </div>
                  <div className="ml-3">
                    <p className="text-sm font-medium text-gray-900">{post.author}</p>
                    <div className="flex space-x-1 text-sm text-gray-500">
                      <Link to={`/blog/${post.slug}`} className="text-blue-600 font-semibold hover:text-blue-500">
                        Read more &rarr;
                      </Link>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
}
