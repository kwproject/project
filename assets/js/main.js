$(document).ready(function() {
    $('#registration-form').submit(function(e){
       
        var validator = $('#registration-form').bootstrapValidator({
            feedbackIcons :{
                valid : "glyphicon glyphicon-ok",
                invalid : "glyphicon glyphicon-remove",
                validating : "glyphicon glyphicon-refresh"
            },
            err: {
                container: 'tooltip'
            },
            fields : {
                username : {
                    validators : {
                        notEmpty : {
                            message : "Username harus disii"    
                        },
                        stringLength : {
                            min : 6,
                            max : 20,
                            message : "Username tidak boleh kurang dari 6 dan lebih dari 20 karakter",
                        }
                    }
                },
                password : {
                    validators : {
                        notEmpty : {
                            message : "Password harus diisi"
                        },
                        stringLength : {
                            min : 8,
                            message : "Password tidak boleh kurang dari 8"
                        },
                        different : {
                            field : "username",
                            message : "Password tidak boleh sama dengan password"
                        },
                    }
                },
                email :{
                    validators : {
                        notEmpty : {
                            message : "Email tidak boleh kosong"
                        },
                        stringLength : {
                            min : 6,
                            max : 25,
                            message : "Email tidak boleh kurang dari 6 dan lebih dari 25"
                        },
                        emailAddress : {
                            message : "email yang anda masukkan tidak valid"
                        },

                    }
                },
                nama : {
                    validators :{
                        notEmpty : {
                            message : "Nama tidak boleh kosong"
                        },
                        stringLength : {
                            min : 4,
                            max : 30,
                            message : "Nama tidak boleh kurang dari 4 dan lebih dari 30"
                        },
                        regexp: {
                            regexp: /^[a-z\s]+$/i,
                            message: 'Nama tidak boleh menggunakan special karakter atau angka'
                        },
                    }
                },

                alamat : {
                    validators : {
                        notEmpty : {
                            message : "Alamat tidak boleh kosong"
                        },
                        stringLength : {
                            max : 200,
                            message : "Alamat tidak boleh lebih dari 200 karakter",
                        }
                    }
                },
                jenis_kelamin : {
                    validators : {
                        notEmpty : {
                            message : "tidak boleh kosong",
                        }
                    }
                }
            }
        });
    });
});