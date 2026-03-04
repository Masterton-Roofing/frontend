import { useState } from "react";

// 1. Component name must be capitalized (Vcl)
// 2. Syntax must be 'function Name()' or 'const Name = () =>'
function Drone() {
  return (
    <>
      {/* Hero Section */}
      <section
        className="hero h-screen bg-cover bg-center"
        style={{ backgroundImage: "url('https://placehold.co/600x400')" }}
      >
        <div className="flex items-center justify-center h-full bg-black/40">
          {" "}
          {/* Added a dark overlay to make text readable */}
          <h1 className="text-white text-5xl font-bold text-center">
            Drone Footage - Solutions
          </h1>
        </div>
      </section>

      {/* Content Section */}
      <section className="py-16 bg-gray-100">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center gap-8">
          <div className="w-full md:w-1/2">
            <h2 className="text-3xl font-bold mb-4 text-gray-900">Drone</h2>
            <p className="text-gray-700 mb-6">
              ARCHIE MATE I TOLD YOU THAT YOU COULDN'T FLY IT MATE
            </p>
          </div>
        </div>
      </section>
    </>
  );
}

// 3. You must export it to use it in your App.jsx
export default Drone;
