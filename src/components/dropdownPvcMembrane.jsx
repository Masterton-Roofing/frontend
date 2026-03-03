import { useState } from 'react';
export default function DropdownPvcMembrane() {
    const [open, setOpen] = useState(false);

    return (
        <div className="w-full mx-auto mt-16">
            <button
                onClick={() => setOpen(!open)}
                className="w-full flex justify-between items-center px-4 py-3 bg-slate-800 text-white rounded-lg transition"
            >
                <span>PVC Membrane</span>
                <span
                    className={`transform transition-transform duration-300 ${
                    open ? 'rotate-180' : ''
                    }
                    }`}
                >
                </span>
            </button>
            <div
                className={`overflow-hidden transition-all duration-300 ${
                open ? 'max-h-[1000px] opacity-100 mt-2' : 'max-h-0 opacity-0'
                }`}
            >
                <div className="p-4 bg-slate-100 rounded-lg text-slate-700">
                    <span className="text-2xl font-bold mb-2">About</span>
                    <p className="mb-4">
                        This PVC roofing membrane is designed to work well on roofs of all shapes and sizes, making it suitable for both simple and more complex designs.
                        It is made to last, with strong resistance to things like natural effects of UV damage and aging over time.
                        The material remains flexible, allowing it to move slightly with the building as temperatures change or the structure settles, which helps prevent damage.
                        When used with mechanically fixed roofing systems, it also helps the roof stay secure by offering excellent resistance to strong winds and uplift forces.
                    </p>
                    <span className="text-2xl font-bold mb-2">Specifications</span>
                    <p className="mb-4">
                        Danosa DANOPOL+ HS

                        Available thicknesses: 1.5 mm, 1.2 mm

                        Available colours: Anthracite

                        Length (cm per roll): 2000 (1.5 mm), 2500 (1.2 mm)

                        Width (cm per roll): 108

                        Fire Regulation: Broof(T4)
                    </p>
                    <img className="mx-auto" src="/img/hs.png"/>
                </div>
            </div>
        </div>
    )
}