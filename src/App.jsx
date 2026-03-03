import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Navbar from './components/Navbar';
import Footer from './components/Footer';
import Home from './pages/Home';
import Solutions from './pages/Solutions';

function App() {
    return (
        <Router>
            <div className="flex flex-col min-h-screen">
                <Navbar />
                <main className="flex-grow mt-16">
                    <Routes>
                        <Route path="/" element={<Home />} />
                        <Route path="/index.html" element={<Home />} />
                        <Route path="/solutions.html" element={<Solutions />} />
                        <Route path="/solutions" element={<Solutions />} />
                    </Routes>
                </main>
                <Footer />
            </div>
        </Router>
    );
}

export default App;
