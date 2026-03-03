import { useState } from 'react';
export default function dropdownReusable() {
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
                        placeholder
                    </p>
                    <span className="text-2xl font-bold mb-2">Specifications</span>
                    <p className="mb-4">
                        placeholder
                    </p>
                    <img className="mx-auto" src="/img/hs.png"/>
                </div>
            </div>
        </div>
    )
}