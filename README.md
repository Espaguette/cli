# Espaguette CLI

**Espaguette CLI** é uma ferramenta que permite definir e executar comandos personalizados através de um arquivo de configuração JSON. Ela simplifica a execução de tarefas comuns do projeto, oferecendo uma interface interativa para selecionar e executar comandos pré-configurados.

## Recursos

- **Menu Interativo**: Navegue através dos comandos disponíveis utilizando as setas do teclado.
- **Configuração Flexível**: Permite adicionar, remover ou modificar comandos facilmente no arquivo `espaguette.json`.
- **Fácil Utilização**: Executa os comandos diretamente no terminal.
- **Flexível**: Permite utilizar qualquer comando, não estando limitado à comandos PHP.

## Requisitos

- PHP 8.0 ou superior
- Composer

## Instalação

1. Instale via Composer (Global):

```bash
composer global require espaguette/cli
```

2. Certifique-se de que o diretório global bin está no seu `PATH`. Para adicioná-lo, inclua no seu `.bashrc`, `.zshrc` ou `.bash_profile`:

```bash
export PATH="$HOME/.config/composer/vendor/bin:$PATH"
```

3. Recarregue o seu ambiente:

```bash
source ~/.bashrc  # ou source ~/.zshrc ou source ~/.bash_profile
```

4. Crie um arquivo `espaguette.json` na raiz do seu projeto:

```json
{
    "comando1": "Descrição do comando 1",
    "comando2": "Descrição do comando 2"
}
```

## Uso

1. Crie o arquivo `espaguette.json` na raiz do seu projeto.
Na raiz do seu projeto, crie o arquivo `espaguette.json` com seus comandos e descrições.
Exemplo:

```json
{
    "bin/cake SincronizarPedidos": "Sincroniza os pedidos do sistema X",
    "php artisan mail:send": "Envia os e-mails pendentes"
}
```

2. Execute a ferramenta:

```bash
espaguette
```

Você verá o menu interativo parecido com este:

```
Select a command to execute:
    [0] bin/cake SincronizarPedidos - Sincroniza os pedidos do sistema X
    [1] php artisan mail:send - Envia os e-mails pendentes
>
```

Utilize as setas up/down para navegar pelos comandos e pressione Enter para executar.

## Licença

Este projeto está licenciado sob a licença MIT - veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## Autor

- **Julyano Silva** - [julyano@jbrsolutions.com.br](mailto:julyano@jbrsolutions.com.br)