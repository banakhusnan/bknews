$(document).ready(function () {
    // Filtering Register
    let buttonReg = $("button#registrasi").prop("disabled", true);

    $("input[name='role']").click(function () {
        const role = $("input[name='role']:checked").val();

        $("input#floatingInput").on("keyup", function () {
            $("input#floatingInput").map((index, val) => {
                if (index) {
                    if (val.value == "") {
                        buttonReg.prop("disabled", true);
                    }
                } else {
                    if (role == "author") {
                        const label = $("label#label").text("Author");

                        if (label.text() == "Author") {
                            $("input[name='id_user']").on("keyup", function () {
                                const noInduk = $(this).val();
                                if (noInduk.split(".")[0] != "06") {
                                    $("#labelNotif").html(
                                        '<small class="text-danger" id="labelNotif">Kamu bukan author</small>'
                                    );
                                    buttonReg.prop("disabled", true);
                                } else {
                                    $("#labelNotif").html(
                                        '<small class="text-primary" id="labelNotif">Masukan no induk menggunakan (.)</small>'
                                    );
                                }
                            });
                        }
                    } else if (role == "mahasiswa") {
                        const label = $("label#label").text("Mahasiswa");

                        if (label.text() == "Mahasiswa") {
                            $("input[name='id_user']").on("keyup", function () {
                                const noInduk = $(this).val();
                                if (noInduk.split(".")[0] != "20") {
                                    $("#labelNotif").html(
                                        '<small class="text-danger" id="labelNotif">Kamu bukan mahasiswa</small>'
                                    );
                                    buttonReg.prop("disabled", true);
                                } else {
                                    $("#labelNotif").html(
                                        '<small class="text-primary" id="labelNotif">Masukan no induk menggunakan (.)</small>'
                                    );
                                }
                            });
                        }
                    }
                    buttonReg.prop("disabled", false);
                }
            });
        });
    });
});
