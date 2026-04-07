<div
    x-data="{ visible: true }"
    x-init="
        const hideLoader = () => setTimeout(() => visible = false, 300);
        window.addEventListener('load', hideLoader);
        setTimeout(() => visible = false, 2500);
    "
    x-show="visible"
    x-transition.opacity.duration.500ms
    class="fixed inset-0 z-50 flex items-center justify-center bg-gradient-to-br from-slate-900 via-emerald-900/30 to-slate-900 backdrop-blur-md"
    aria-live="polite"
>
    <div class="flex flex-col items-center gap-6 text-white text-center">
        <!-- Hamster Wheel Animation -->
        <div class="relative w-40 h-40">
            <!-- Glow Effect -->
            <div class="absolute inset-0 rounded-full bg-gradient-to-r from-emerald-400/30 via-lime-400/30 to-yellow-400/30 blur-2xl animate-pulse"></div>
            
            <!-- Wheel (Rotating) - Behind -->
            <div class="absolute inset-0 flex items-center justify-center animate-spin-wheel z-10">
                <div class="relative w-32 h-32 rounded-full border-8 border-emerald-400/40 border-dashed"></div>
                <!-- Wheel Spokes -->
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-1 h-32 bg-emerald-400/30 rounded-full"></div>
                </div>
                <div class="absolute inset-0 flex items-center justify-center rotate-45">
                    <div class="w-1 h-32 bg-emerald-400/30 rounded-full"></div>
                </div>
                <div class="absolute inset-0 flex items-center justify-center rotate-90">
                    <div class="w-1 h-32 bg-emerald-400/30 rounded-full"></div>
                </div>
                <div class="absolute inset-0 flex items-center justify-center -rotate-45">
                    <div class="w-1 h-32 bg-emerald-400/30 rounded-full"></div>
                </div>
            </div>
            
            <!-- Squirrel (Running in place) - In Front -->
            <div class="absolute inset-0 flex items-center justify-center z-20">
                <div class="text-6xl animate-run drop-shadow-2xl" aria-hidden="true">🐿️</div>
            </div>
            
            <!-- Center Hub - In Front -->
            <div class="absolute inset-0 flex items-center justify-center z-30">
                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-emerald-500 to-lime-500 shadow-lg"></div>
            </div>
        </div>

        <div class="px-5 py-2 rounded-full bg-gradient-to-r from-emerald-500/20 to-lime-500/20 border border-emerald-400/30 backdrop-blur-sm">
            <p class="text-xs uppercase tracking-[0.5em] text-emerald-200 font-semibold">Tupai Dev lagi nge-compile</p>
        </div>
        <p class="text-base text-white/90 font-medium">Sabar ya, tupai ini lagi ngumpulin XP buatmu.</p>
        <p class="text-sm text-emerald-300 italic">"Bentar lagi selesai kok!"</p>
    </div>
</div>

<style>
    @keyframes spin-wheel {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    
    @keyframes run {
        0%, 100% { 
            transform: translateY(0px) scale(1);
        }
        25% { 
            transform: translateY(-3px) scale(1.05);
        }
        50% { 
            transform: translateY(0px) scale(1);
        }
        75% { 
            transform: translateY(-3px) scale(1.05);
        }
    }
    
    .animate-spin-wheel {
        animation: spin-wheel 2s linear infinite;
    }
    
    .animate-run {
        animation: run 0.4s ease-in-out infinite;
    }
</style>
