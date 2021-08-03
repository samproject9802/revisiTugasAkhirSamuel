$(document).ready(function() {
                $(".pass-two").on('keyup', function() {
                    var password = $(".pass-one").val();
                    var confirmPassword = $(".pass-two").val();
                    if (password != confirmPassword) {
                        $(".pass-valid1").children("i.icon").css("background", "red");
                        $(".pass-valid2").children("i.icon").css("background", "red");
                        $(".pass-one").css("border", "2px solid red");
                        $(".pass-two").css("border", "2px solid red");
                        $(".icon-tog1").children("i.icon-toggle").css("background", "red");
                        $(".icon-tog2").children("i.icon-toggle").css("background", "red");
                        $(".pass-one").focus(function() {
                            $(".pass-one").css("background", "white");
                            $(".pass-one").css("color", "red");
                        });
                        $(".pass-one").focusout(function() {
                            $(".pass-one").css("background", "red");
                            $(".pass-one").css("color", "white");
                        });
                        $(".pass-two").focus(function() {
                            $(".pass-two").css("background", "white");
                            $(".pass-two").css("color", "red");
                        });
                        $(".pass-two").focusout(function() {
                            $(".pass-two").css("background", "red");
                            $(".pass-two").css("color", "white");
                        });
                    } else {
                        $(".pass-valid1").children("i.icon").css("background", "blue");
                        $(".pass-valid2").children("i.icon").css("background", "blue");
                        $(".pass-one").css("border", "2px solid blue");
                        $(".pass-two").css("border", "2px solid blue");
                        $(".icon-tog1").children("i.icon-toggle").css("background", "blue");
                        $(".icon-tog2").children("i.icon-toggle").css("background", "blue");
                        $(".pass-one").focus(function() {
                            $(".pass-one").css("background", "white");
                            $(".pass-one").css("color", "blue");
                        });
                        $(".pass-one").focusout(function() {
                            $(".pass-one").css("background", "blue");
                            $(".pass-one").css("color", "white");
                        });
                        $(".pass-two").focus(function() {
                            $(".pass-two").css("background", "white");
                            $(".pass-two").css("color", "blue");
                        });
                        $(".pass-two").focusout(function() {
                            $(".pass-two").css("background", "blue");
                            $(".pass-two").css("color", "white");
                        });
                    }
                })
            });