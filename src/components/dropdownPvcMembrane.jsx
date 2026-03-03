import { useState } from 'react';
export default function DropdownPvcMembrane() {
    const [open, setOpen] = useState(false);

    return (
        <div className="w-96 mx-auto mt-16">
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
                open ? 'max-h-40 opacity-100 mt-2' : 'max-h-0 opacity-0'
                }`}
            >
                <div className="p-4 bg-slate-100 rounded-lg text-slate-700">
                    text
                </div>
            </div>
        </div>
    )
}