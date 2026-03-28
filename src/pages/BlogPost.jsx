import { useState, useEffect } from "react";
import { useParams, Link } from "react-router-dom";
import ReactMarkdown from "react-markdown";
import { getBlogPost } from "../utils/blog";
import { ChevronLeft, Calendar, User } from "lucide-react";

export default function BlogPost() {
  const { slug } = useParams();
  const [post, setPost] = useState(null);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    async function loadPost() {
      setLoading(true);
      const data = await getBlogPost(slug);
      setPost(data);
      setLoading(false);
    }
    loadPost();
  }, [slug]);

  if (loading) {
    return (
      <div className="flex items-center justify-center min-h-[50vh]">
        <div className="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600"></div>
      </div>
    );
  }

  if (!post) {
    return (
      <div className="max-w-3xl mx-auto px-4 py-20 text-center">
        <h2 className="text-2xl font-bold text-gray-900 mb-4">Post Not Found</h2>
        <Link to="/blog" className="text-blue-600 hover:text-blue-500 font-semibold inline-flex items-center">
          <ChevronLeft className="mr-2 h-4 w-4" /> Back to Blog
        </Link>
      </div>
    );
  }

  return (
    <article className="bg-white py-12 px-4 sm:px-6 lg:px-8">
      <div className="max-w-3xl mx-auto">
        <Link to="/blog" className="text-blue-600 hover:text-blue-500 font-semibold inline-flex items-center mb-8">
          <ChevronLeft className="mr-2 h-4 w-4" /> Back to Blog
        </Link>
        
        <header className="mb-8">
          <h1 className="text-4xl font-extrabold text-gray-900 mb-4">{post.title}</h1>
          <div className="flex items-center text-gray-500 text-sm space-x-6">
            <span className="flex items-center">
              <Calendar className="mr-2 h-4 w-4" />
              {new Date(post.date).toLocaleDateString()}
            </span>
            <span className="flex items-center">
              <User className="mr-2 h-4 w-4" />
              {post.author}
            </span>
          </div>
        </header>

        {post.image && (
          <div className="mb-8 overflow-hidden rounded-xl">
            <img src={post.image} alt={post.title} className="w-full h-auto object-cover max-h-[400px]" />
          </div>
        )}

        <div className="prose prose-lg prose-blue max-w-none">
          <ReactMarkdown>{post.content}</ReactMarkdown>
        </div>
      </div>
    </article>
  );
}
