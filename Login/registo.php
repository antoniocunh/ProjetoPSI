<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-8 col-xl-6">
                    <form action="sendRegistration.php" method="post">
                        <div class="row">
                            <div class="col text-center">
                                <h1>Registar</h1>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col mt-4">
                                <input name="nome" type="text" class="form-control is-invalid" placeholder="Nome">
                                <small id="passwordHelp" class="text-danger">
                                    Must be 8-20 characters long.
                                </small>     
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col mt-4">
                                <input name="ultimoNome" type="text" class="form-control" placeholder="Sobrenome">
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col mt-4">
                                <input name="ambito" type="text" class="form-control" placeholder="Âmbito">
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col mt-4">
                                <input name="morada"type="text" class="form-control" placeholder="Morada">
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col mt-4">
                                <input name="telefone" type="text" class="form-control" placeholder="Número de Telemóvel">
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col mt-4">
                                <input name="pais" type="text" class="form-control" placeholder=" País">
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col mt-4">
                                <input name="cidade" type="text" class="form-control" placeholder=" Cidade">
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col mt-4">
                                <input name="codPostal" type="text" class="form-control" placeholder=" Código Postal">
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col mt-4">
                                <input name="organizacao" type="text" class="form-control" placeholder=" Organização">
                            </div>
                        </div>


                        <div class="row align-items-center mt-4">
                            <div class="col">
                                <input name="email" type="email" class="form-control" placeholder="Email">
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col mt-4">
                                <input name="username" type="text" class="form-control" placeholder=" Username">
                            </div>
                        </div>

                        <div class="row align-items-center mt-4">
                            <div class="col">
                                <input name="pass1" type="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="col">
                                <input name="pass2" type="password" class="form-control" placeholder="Confirmar Password">
                            </div>
                        </div>
                        <div class="row justify-content-start mt-4">
                            <div class="col">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                        I Read and Accept <a href="https://www.google.com">Terms and Conditions</a>
                                    </label>
                                </div>

                                <button class="btn btn-primary mt-4">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>