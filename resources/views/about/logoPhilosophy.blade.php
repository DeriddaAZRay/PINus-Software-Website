@extends('layout')
@section('content')
<div class="relative">
    <!-- Background image -->
    <div class="absolute left-0 top-0 h-full w-full md:w-1/2">
        <img src="{{ asset('images/about/logo-philosophy.png') }}" alt="Logo Philosophy"
            class="h-full w-full object-cover md:object-left object-center">
        <!-- Gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-b md:bg-gradient-to-r from-transparent via-transparent to-white/40 md:to-white/40"></div>
        <!-- Mobile overlay -->
        <div class="absolute inset-0 bg-black/15 md:bg-transparent"></div>
    </div>
    
    <div class="container mx-auto relative">
        <div class="w-full md:ml-auto md:w-3/4 bg-white/10 backdrop-blur-md border border-white/30 shadow-lg min-h-screen md:min-h-auto">
            <div class="relative z-10 bg-gradient-to-b md:bg-gradient-to-r from-white/80 md:from-white/60 via-white/70 md:via-white/40 to-white/60 md:to-white/20 backdrop-blur-sm">
                <!-- Header -->
                <div class="py-6 md:py-6 pt-12 md:pt-8 relative overflow-hidden">
                    <div class="container mx-auto relative z-10">
                        <div class="flex items-center justify-center mb-4 relative">
                            <div class="text-center">
                                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Logo Philosophy</h1>
                                <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-red-500 mx-auto mb-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content section -->
                <div class="px-6 py-6 md:px-6 md:py-6">
                    <div class="max-w-4xl mx-auto space-y-8">
                        
                        <!-- Company Logo Philosophy -->
                        <div class="bg-white/70 backdrop-blur-sm rounded-lg p-6 shadow-md">
                            <div class="flex items-center mb-6">
                                <div class="w-64 h-24 mr-4">
                                    <img src="{{ asset('images/logo-footer.png') }}" alt="Company Logo" class="h-full w-full object-contain">
                                </div>
                                <h2 class="text-2xl font-bold text-gray-800">Our Company Logo Philosophy</h2>
                            </div>
                            <p class="text-sm text-gray-700 mb-6 leading-relaxed">
                                The logo of <strong>PT Performa Inti Nusantara</strong> represents the company's commitment to being a trusted software house and IT consultant, offering collaboration and technology-driven solutions that continually evolve to address digital challenges and Provide Better Performance.
                            </p>
                            
                            <div class="space-y-4">
                                <div>
                                    <h3 class="font-semibold text-gray-800 mb-2">• Hexagon Shape.</h3>
                                    <p class="text-sm text-gray-700 ml-4">Symbolizes strength, structure, and efficiency—qualities commonly found in both technology and nature (e.g., honeycomb). In design, stability, and system integrity. The hexagon shape, aesthetic qualities, alongside business success indicator. PINus innovative and collaborative aspects.</p>
                                </div>
                                
                                <div>
                                    <h3 class="font-semibold text-gray-800 mb-2">• Supporting Hands (Top and Bottom).</h3>
                                    <p class="text-sm text-gray-700 ml-4">represent trust, collaboration, and service. The upper hand symbolizes PINus as a provider of solutions and support, while the lower hand represents clients receiving services from PINus. Together, they reflect a professional and human-centered commitment to partnership and service excellence.</p>
                                </div>
                                
                                <div>
                                    <h3 class="font-semibold text-gray-800 mb-2">• Blue Dots on Both Sides.</h3>
                                    <p class="text-sm text-gray-700 ml-4">Indicate connectivity and represent technology and humanity. They highlight the company's focus not only on technological innovation but also on human relationships—with clients and communities alike.</p>
                                </div>
                                
                                <div>
                                    <h3 class="font-semibold text-gray-800 mb-2">• "PINus" Inside the Hexagon.</h3>
                                    <p class="text-sm text-gray-700 ml-4">"PINus" at the center reinforces the company's mission. The unique and memorable name represents our values: innovation, reliability, and high performance.</p>
                                </div>
                                
                                <div>
                                    <h3 class="font-semibold text-gray-800 mb-2">• "PROVIDE BETTER PERFORMANCE" Tagline.</h3>
                                    <p class="text-sm text-gray-700 ml-4">Emphasizes the company's mission to deliver superior performance and results across all services and operations.</p>
                                </div>
                                
                                <div>
                                    <h3 class="font-semibold text-gray-800 mb-2">• Red and Blue Color Scheme.</h3>
                                    <p class="text-sm text-gray-700 ml-4">Red signifies passion, energy, and determination—used in the tagline and service focus areas to highlight strength. Blue conveys trust, professionalism, and technology—seen in the outline and lines, representing modernity and reliability. Gray used in the company name underlines professionalism and maturity.</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Product Logo Philosophy -->
                        <div class="bg-white/70 backdrop-blur-sm rounded-lg p-6 shadow-md">
                            <div class="flex items-center mb-6">
                                <div class="w-32 h-24 mr-4">
                                    <img src="{{ asset('images/logo.png') }}" alt="Product Logo" class="h-full w-full object-contain">
                                </div>
                                <h2 class="text-2xl font-bold text-gray-800">Our Product Logo Philosophy</h2>
                            </div>
                            
                            <p class="text-sm text-gray-700 mb-6 leading-relaxed">
                                The logo of <strong>PINus Software</strong> reflects the company's product identity as a technology solutions provider that is innovative, professional, and service-oriented. Each element within the design carries thoughtful meaning:
                            </p>
                            
                            <div class="space-y-4">
                                <div>
                                    <h3 class="font-semibold text-gray-800 mb-2">• Abstract Pine Tree Symbol (Top of Logo).</h3>
                                    <p class="text-sm text-gray-700 ml-4">The graphic shape resembling a pine tree is constructed from red and blue wave-like dots, symbolizing growth, resilience, and structured systems—just like the real pine tree known for its endurance. The interconnected waves represent data flow, system integration, and seamless connectivity, essential for modern digital environments.</p>
                                </div>
                                
                                <div>
                                    <h3 class="font-semibold text-gray-800 mb-2">• Wave-like Pattern.</h3>
                                    <p class="text-sm text-gray-700 ml-4">Suggests dynamic movement, adaptability, and forward momentum—representing the seamless flow of services, care, and the company's commitment to helping clients grow and succeed. These waves also reflect human-centric values, where technology is built to save and empower people, communities, and communities.</p>
                                </div>
                                
                                <div>
                                    <h3 class="font-semibold text-gray-800 mb-2">• Red and Blue Color Scheme.</h3>
                                    <p class="text-sm text-gray-700 ml-4">Red symbolizes passion, energy, and boldness, expressing the company's drive to deliver impactful and innovative solutions. Blue represents trust, professionalism, stability, and technology, underscoring PINus Software's role as a dependable digital partner.</p>
                                </div>
                                
                                <div>
                                    <h3 class="font-semibold text-gray-800 mb-2">• "PINus" Text & SOFTWARE Typography.</h3>
                                    <p class="text-sm text-gray-700 ml-4">"PINus" stands for Performa Inti Nusantara, prominently displayed in bold and contrasting colors to emphasize the company's core identity—innovation, reliability, and high performance. Software typography placed neatly below the main name, it clearly communicates the company's focus in software development and IT consultancy services.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection