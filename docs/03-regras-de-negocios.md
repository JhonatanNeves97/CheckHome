# 03 - Regras de Negócio

## 1. Usuários

**RN001** - O sistema deverá possuir pelo menos um gestor cadastrado.

**RN002** - O e-mail de cada usuário deverá ser único no sistema.

**RN003** - Usuários desativados não poderão realizar login.

**RN004** - Apenas gestores poderão cadastrar novos usuários.

**RN005** - Apenas gestores poderão alterar o perfil de acesso de um usuário.

**RN006** - A senha dos usuários deverá ser armazenada de forma criptografada.

---

## 2. Imóveis

**RN007** - Todo imóvel deverá estar vinculado a um proprietário.

**RN008** - Um proprietário poderá possuir um ou mais imóveis.

**RN009** - Um imóvel não poderá ser excluído caso possua contratos cadastrados.

**RN010** - Um imóvel desativado não poderá receber novos contratos.

---

## 3. Contratos

**RN011** - Todo contrato deverá estar vinculado a um imóvel.

**RN012** - Todo contrato deverá possuir um proprietário.

**RN013** - Todo contrato deverá possuir um inquilino.

**RN014** - Um imóvel não poderá possuir mais de um contrato ativo simultaneamente.

**RN015** - Um contrato encerrado não poderá ser editado.

**RN016** - Um contrato encerrado permanecerá disponível apenas para consulta.

---

## 4. Vistorias

**RN017** - Toda vistoria deverá estar vinculada a um contrato.

**RN018** - Toda vistoria deverá possuir um vistoriador responsável.

**RN019** - O sistema deverá permitir os tipos de vistoria Entrada, Saída e Outros.

**RN020** - O gestor será responsável pelo agendamento das vistorias.

**RN021** - Somente o vistoriador responsável poderá registrar informações na vistoria.

**RN022** - Fotografias somente poderão ser excluídas antes da finalização da vistoria.

**RN023** - Após a finalização da vistoria, nenhuma fotografia poderá ser alterada ou removida.

**RN024** - Após a finalização da vistoria, nenhuma observação poderá ser alterada.

**RN025** - Uma vistoria somente poderá ser finalizada após o preenchimento de todos os cômodos obrigatórios.

**RN026** - O sistema deverá manter o histórico de todas as vistorias realizadas.

**RN027** - Uma vistoria finalizada não poderá ser excluída.

---

## 5. Cômodos e Itens

**RN028** - Toda vistoria deverá conter os cômodos necessários para representar completamente o imóvel.

**RN029** - Cada cômodo deverá possuir, no mínimo, três itens cadastrados, representando os principais elementos vistoriados.

**RN030** - Ao adicionar um cômodo à vistoria, o sistema deverá sugerir automaticamente os itens padrão correspondentes ao tipo de cômodo.

**RN031** - O vistoriador poderá remover os itens sugeridos que não existirem no imóvel.

**RN032** - O vistoriador poderá adicionar novos itens que não estejam presentes no modelo padrão do cômodo.

**RN033** - Cada item deverá possuir as fotografias necessárias para permitir a visualização completa e clara do seu estado de conservação.

**RN034** - Caso o item apresente avarias, será obrigatório o registro de uma observação descrevendo o problema.

---

## 6. Permissões

**RN035** - O gestor terá acesso completo às funcionalidades do sistema.

**RN036** - O vistoriador terá acesso apenas às vistorias que lhe forem atribuídas.

**RN037** - O proprietário poderá visualizar apenas seus imóveis, contratos e vistorias.

**RN038** - O inquilino poderá visualizar apenas seu contrato e as vistorias relacionadas.

**RN039** - Proprietários e inquilinos não poderão alterar informações das vistorias.

---

## 7. Integridade dos Dados

**RN040** - O sistema não deverá excluir permanentemente informações importantes, priorizando a desativação de registros sempre que possível.

**RN041** - Toda alteração relevante deverá registrar a data, a hora e o usuário responsável.

**RN042** - Todas as fotografias deverão permanecer vinculadas ao respectivo item da vistoria.

**RN043** - Todos os registros deverão possuir data de criação e data da última atualização.

**RN044** - O sistema deverá manter a integridade dos relacionamentos entre usuários, imóveis, contratos e vistorias, impedindo a exclusão de registros que comprometam o histórico do sistema.

**RN045** - Um usuário poderá possuir um ou mais perfis de acesso.

**RN046** - Caso o usuário possua mais de um perfil, o sistema deverá permitir alternar entre os perfis sem a necessidade de realizar um novo login.