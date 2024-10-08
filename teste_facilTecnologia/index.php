<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    
    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>

            <div class="container mt-5">
                <h2 class="text-center mb-4">Detalhes dos Contratos Bancários</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <caption>Tabela atividade 01</caption>
                        <thead class="thead-dark">
                            <tr>
                                <th>Nome do Banco</th>
                                <th>Verba</th>
                                <th>Código do Contrato</th>
                                <th>Data de Inclusão</th>
                                <th>Valor</th>
                                <th>Prazo</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php 
                                    include 'connect.php';

                                    $sql = "SELECT ctr.codigo, ctr.prazo, ctr.valor,ctr.data_inclusao, conv.verba, banco.nome
                                            FROM tb_contrato AS ctr
                                            JOIN tb_convenio_servico AS con_serv 
                                                ON ctr.convenio_servico = con_serv.codigo
                                            JOIN tb_convenio AS conv
                                                ON con_serv.convenio = conv.codigo
                                            JOIN tb_banco AS banco
                                                ON conv.banco = banco.codigo;";

                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {

                                        $dataOriginal = $row['data_inclusao'];
                                        $data = new DateTime($dataOriginal);
                                        $dataInclusao = $data->format('d/m/Y H:i:s'); 

                                        $dataOriginal = $row['prazo'];
                                        $data = new DateTime($dataOriginal);
                                        $prazo = $data->format('d/m/Y H:i:s'); 
                                    ?>
                                        <tr>
                                            <td><?= $row['nome'] ?></td>
                                            <td><?='R$ ' . number_format($row['verba'], 2, ',', '.') ?></td>
                                            <td><?= $row['codigo'] ?></td>
                                            <td><?=  $dataInclusao ?></td>
                                            <td><?='R$ ' .   number_format($row['valor'], 2, ',', '.') ?></td>
                                            <td><?= $prazo?></td>
                                        </tr>
                                    <?php 
                                            }
                                        } else {
                                        echo "0 results";
                                        }
                                    ?>
                                       
                                    

                            <!-- Adicione mais linhas conforme necessário -->
                        </tbody>
                    </table>
                </div>
                <a href="atv02.php">
                    <p>Ir para Atividade 02</p>
                </a>
            </div>

        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
