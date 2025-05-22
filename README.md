
# API de Gestão de Clientes

## Autenticação
- **Tipo:** Basic Auth
- **User:** cliente1
- **Password:** passcliente1

## Como acessar a API
```bash
git clone https://github.com/Paulo-VictorSB/api.git
```

## Endpoints

### GET
- `/api_status/` - Verifica se a API está ativa.
- `/get_all_clients/` - Retorna todos os clientes.
- `/get_client/` - Retorna dados de um cliente específico pelo ID.
- `/get_client_by_city/` - Retorna clientes filtrando por cidade.
- `/get_client_by_email_domain/` - Retorna clientes filtrando por domínio de e-mail.
- `/get_total_males_and_females/` - Retorna total de clientes por gênero.

### POST
- `/add_new_client/` - Adiciona novo cliente.
```json
{ "nome": "", "sexo": "", "data_nascimento": "", "email": "", "telefone": "", "morada": "", "cidade": "", "ativo": true }
```

### PUT
- `/update_client_name/` - Atualiza nome do cliente.
- `/update_client_email/` - Atualiza e-mail do cliente.
```json
{ "id": "", "nome": "" }
```

### PATCH
- `/delete_client/` - Deleta cliente pelo ID.
```json
{ "id": "" }
```

## Respostas de erro
```json
{ "status": "error", "error_message": "Missing authentication credentials.", "data": null, "time_response": 1747927991, "api_version": "1.0.0" }
```