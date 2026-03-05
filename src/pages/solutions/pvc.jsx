import { useState } from "react";
import SolutionArticle from "../../components/SolutionArticle";

// 1. Component name must be capitalized (Vcl)
// 2. Syntax must be 'function Name()' or 'const Name = () =>'
function Pvc() {
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
            PVC Membrane - Solutions
          </h1>
        </div>
      </section>

      {/* Content Section */}
      <section className="py-16 bg-gray-100">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center gap-8">
          <div className="w-full md:w-1/2">
            <h2 className="text-3xl font-bold mb-4 text-gray-900">
              Our PVC Solutions
            </h2>
            <SolutionArticle title="PVC Corners"
            blurb="Corners are essential for any roof as they seal open corners and prevent water from entering the building. It is incredibly effective at preventing leaks since it is pre-made and fit like puzzle pieces."
            about="The pre-made corners seal all corner openings on the roof by putting in a corner and hot air welding them in place just like normal PVC membrane. 
            This makes sure that no rainwater can enter your home or business through these areas. 
            The best part about using pre-made corners is that you can adjust them to the angle of the corner whether it's an obtuse angle or acute." 
            specs="Danosa External/Internal PVC Corners

            Colour: Anthracite
            
            Length (cm): 10
            
            Available variants: Internal, External"
            image="/img/corner.png"/>
          </div>
        </div>
      </section>
    </>
  );
}

// 3. You must export it to use it in your App.jsx
export default Pvc;
