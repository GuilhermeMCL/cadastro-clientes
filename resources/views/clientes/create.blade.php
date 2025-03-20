<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Cadastro de Cliente</h2>

        <form id="cadastroCliente">
            <div class="row mb-3">
                <label for="nome" class="col-sm-2 col-form-label">Nome:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="cep" class="col-sm-2 col-form-label">CEP:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cep" name="cep" maxlength="8" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="logradouro" class="col-sm-2 col-form-label">Logradouro:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="logradouro" name="logradouro" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label for="bairro" class="col-sm-2 col-form-label">Bairro:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="bairro" name="bairro" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label for="cidade" class="col-sm-2 col-form-label">Cidade:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cidade" name="cidade" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label for="estado" class="col-sm-2 col-form-label">Estado:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="estado" name="estado" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label for="telefone" class="col-sm-2 col-form-label">Telefone:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="telefone" name="telefone" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">E-mail:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Função para buscar o endereço via API
        document.getElementById('cep').addEventListener('keydown', function(event) {
            if (event.keyCode === 9) {  // Quando Tab for pressionado
                var cep = document.getElementById('cep').value;
                if (cep.length === 8) {
                    event.preventDefault();
                    buscarEndereco(cep);
                }
            }
        });

        function buscarEndereco(cep) {
            fetch(`/cep`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ cep: cep })
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else {
                    document.getElementById('logradouro').value = data.logradouro;
                    document.getElementById('bairro').value = data.bairro;
                    document.getElementById('cidade').value = data.localidade;
                    document.getElementById('estado').value = data.uf;
                }
            })
            .catch(error => {
                console.error('Erro ao buscar endereço:', error);
                alert('Erro ao buscar endereço.');
            });
        }
    </script>
</body>
</html>
