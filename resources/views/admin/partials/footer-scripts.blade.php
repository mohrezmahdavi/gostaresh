        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="{{ asset('assets/admin/material/js/vendor.min.js') }}"></script>

        <script src="{{ asset('assets/admin/material/js/app.min.js') }}"></script>

        @yield('body-scripts')

        <!-- Dashboard init-->
        {{-- <script src="{{ asset('assets/admin/material/js/pages/dashboard-sales.init.js') }}"></script> --}}

        <!-- App js -->

        <script>
                function whatDecimalSeparator() {
                        var n = 1.1;
                        n = n.toLocaleString().substring(1, 2);
                        return n;
                }

                function removeLeadingZeroesForInput(){
                        $(':input').each(function(){
                                if($(this).val().includes(".")){
                                        $(this).val( $(this).val().replaceAll(/0*$/g, "") );
                                        if ($(this).val().charAt($(this).val().length - 1) == whatDecimalSeparator() ) {
                                                console.log("b:  ",$(this).val());
                                                $(this).val( $(this).val().substr(0, $(this).val().length - 1) );
                                        }
                                }
                        })
                }

                function removeLeadingZeroesForTable(){
                        $('.table td').each(function(){
                                if($(this).text().includes(".")){
                                        $(this).text( $(this).text().replaceAll(/0*$/g, "") );
                                        if ($(this).text().charAt($(this).text().length - 1) == whatDecimalSeparator() ) {
                                                console.log("b:  ",$(this).text());
                                                $(this).text( $(this).text().substr(0, $(this).text().length - 1) );
                                        }
                                }
                        })
                }

                removeLeadingZeroesForInput();
                removeLeadingZeroesForTable();
        </script>