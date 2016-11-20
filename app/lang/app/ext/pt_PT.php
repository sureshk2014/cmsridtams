<?php
$lang['action_freshen'] = 'A refrescar / reparar uma instalação CMSMS %s';
$lang['action_install'] = 'A criar um site CMSMS %s';
$lang['action_upgrade'] = 'A actualizar um site CMSMS para a versão %s';
$lang['advanced_mode'] = 'Habilitar o modo avançado';
$lang['apptitle'] = 'Assistente de instalação e actualização';
$lang['available_languages'] = 'Linguagens disponíveis';
$lang['build_date'] = 'Data de Build';
$lang['changelog_uc'] = 'REGISTO CHANGELOG';
$lang['cleaning_files'] = 'A apagar os ficheiros que já não se aplicam a esta versão';
$lang['config_writable'] = 'A verificar se existe um ficheiro config escrevível';
$lang['confirm_freshen'] = 'Tem a certeza de que quer refrescar (reparar) a instalação existente do CMSMS? Use extrema precaução!';
$lang['confirm_upgrade'] = 'Tem a certeza de que quer iniciar o processo de actualização?';
$lang['curl_extension'] = 'A verificar a extensão CURL';
$lang['database_support'] = 'A verificar drivers de base de dados compatíveis';
$lang['desc_wizard_step1'] = 'Iniciar o processo de instalação ou actualização';
$lang['desc_wizard_step2'] = 'Analizar o directório de destino à procura de software existente';
$lang['desc_wizard_step3'] = 'A verificar se está tudo OK para prosseguir com a instalação do núcleo do CMSMS';
$lang['desc_wizard_step4'] = 'Para novas instalações, e operação de refrescar, digite os dados de configuração básica';
$lang['desc_wizard_step5'] = 'Para novas instalações, digite os dados da conta Administração';
$lang['desc_wizard_step6'] = 'Para novas instalações digite alguns detalhes básicos do site';
$lang['desc_wizard_step7'] = 'Extrair ficheiros';
$lang['desc_wizard_step8'] = 'Criar ou actualizar o schema da base de dados, configurar eventos iniciais, permissões, contas de utilizador, escantilhões (templates), folhas de estilo (stylesheets) e conteúdo';
$lang['desc_wizard_step9'] = 'Instalar e/ou actualizar módulos conforme necessário, criar ficheiro config, e remover o lixo.';
$lang['destination_directory'] = 'Directório de Destino';
$lang['dest_writable'] = 'Permissões de escrita no directório de destino';
$lang['disable_functions'] = 'Funções desabilitadas';
$lang['done'] = 'Concluído';
$lang['email_accountinfo_message'] = 'A sua instalação do CMS Made Simple está completa.

Este email contém dados sensíveis, e deve ser guardado de forma segura.

Estes são os detalhes da sua instalação:
Nome de Utilizador: %s
Senha: %s
Directório de Instalação: %s
URL da Root: %s';
$lang['email_accountinfo_message_exp'] = 'A sua instalação do CMS Made Simple está completa.

Este email contém dados sensíveis, e deve ser guardado de forma segura.

Estes são os detalhes da sua instalação:
Nome de Utilizador: %s
Senha: %s
Directório de Instalação: %s';
$lang['email_accountinfo_subject'] = 'CMS Made Simple foi Instalado com Sucesso';
$lang['emailaccountinfo'] = 'Enviar os dados da conta por email';
$lang['emailaddr'] = 'Endereço de Email';
$lang['error_adminacct_emailaddr'] = 'O endereço de email especificado não é válido';
$lang['error_adminacct_emailaddrrequired'] = 'Foi seleccionada a opção de enviar os dados da conta por email, mas não foi especificado um endereço de email válido';
$lang['error_adminacct_password'] = 'A senha especificada não é válida (no mínimo deverá ter seis charateres)';
$lang['error_adminacct_repeatpw'] = 'As senhas digitadas não são iguais.';
$lang['error_adminacct_username'] = 'O nome de utilizador especificado não é válido. Por favor tente de novo';
$lang['error_admindirrenamed'] = 'Aparentemente terá mudado o nome do directório de Admin do CMSMS por razões de segurança. Reverta para o nome original para prosseguir';
$lang['error_backupconfig'] = 'Não foi possível fazer um backup apropriado do ficheiro de config';
$lang['error_checksum'] = 'O checksum do ficheiro extraído não confere com o original';
$lang['error_cmstablesexist'] = 'Aparentemente já existe uma instalação de CMSMS nesta base de dados. Por favor, especifique dados diferentes para esta instalação. Se desejar usar um prefixo de tabelas diferentes, poderá ter de reiniciar o processo de instalação e habilitar o Modo Avançado.';
$lang['error_createtable'] = 'Problema ao criar tabela na base de dados... provavelmente uma questão de permissões';
$lang['error_dbconnect'] = 'Não foi possível estabelecer ligação com a base de dados. Por favor verifique cuidadosamente as credenciais fornecidas';
$lang['error_dirnotvalid'] = 'O directório %s não existe (ou não permite escrita)';
$lang['error_droptable'] = 'Foi detectado um problema ao apagar a tabela da base de dados... possivelmente uma questão de permissões';
$lang['error_filenotwritable'] = 'Não foi possível re-escrever o ficheiro %s (problema de permissões)';
$lang['error_internal'] = 'Lamentamos, alguma coisa correu mal... (erro interno) (%s)';
$lang['error_invalid_directory'] = 'Aparentemente o directório que foi escolhido para a instalação é o directório de trabalho do próprio instalador';
$lang['error_invalidconfig'] = 'Erro no ficheiro config, ou ficheiro de config inexistente';
$lang['error_invaliddbpassword'] = 'A senha da base de dados contem caracteres inválidos os quais não poderão ser correctamente guardados.';
$lang['error_invalidkey'] = 'Chave ou variável inválida %s na classe %s';
$lang['error_invalidparam'] = 'Parâmetro ou valor do parâmetro inválido: %s';
$lang['error_missingconfigvar'] = 'A chave "%s" do ficheiro config.ini ou não existe ou não é válida';
$lang['error_noarchive'] = 'Problema na procura do ficheiro de archivo... por favor reinicie';
$lang['error_nlsnotfound'] = 'Problema na procura de ficheiros NLS no ficheiro de archivo';
$lang['error_nodatabases'] = 'Não foram encontrados extensões compatíveis de base de dados';
$lang['error_nodbhost'] = 'Por favor digite um nome de host (ou um endereço de IP) válido para a ligação à base de dados';
$lang['error_nodbname'] = 'Por favor digite o nome de uma base de dados válida no host especificado anteriormente';
$lang['error_nodbpass'] = 'Por favor digite uma senha válida para autenticar a ligação à base de dados';
$lang['error_nodbprefix'] = 'Por favor digite um prefixo válido para as tabelas da base de dados';
$lang['error_nodbtype'] = 'Por favor seleccione um tipo de base de dados';
$lang['error_nodbuser'] = 'Por favor digite';
$lang['error_nodestdir'] = 'O directório de destino não foi definido';
$lang['error_nositename'] = 'O nome do site é um parâmetro requerido. Por favor digite um nome adequado para o seu website';
$lang['error_notimezone'] = 'Por favor digite um fuso horário válido para este servidor';
$lang['error_sendingmail'] = 'Erro ao enviar email';
$lang['error_tzlist'] = 'Ocorreu um problema ao obter a lista de identificadores de fuso horário';
$lang['errorlevel_estrict'] = 'Verificação de E_STRICT';
$lang['errorlevel_edeprecated'] = 'Verificação de E_DEPRECATED';
$lang['edeprecated_enabled'] = 'A directiva E_DEPRECATED está activa na configuração de PHP error_reporting. Não é impedimento para a operação do CMSMS mas poderá resultar no aparecimento de avisos PHP nas páginas, em particular como resultado do uso de módulos de terceiros mais antigos.';
$lang['estrict_enabled'] = 'A directiva E_STRICT está activa na configuração de PHP error_reporting. Não é impedimento para a operação do CMSMS mas poderá resultar no aparecimento de avisos PHP nas páginas, em particular como resultado do uso de módulos de terceiros mais antigos.';
$lang['fail_config_writable'] = 'O processo HTTP não consegue escrever no ficheiro config.php. Por favor tente mudar as permissões deste ficheiro para 777 até ao final do processo de actualização';
$lang['fail_curl_extension'] = 'A extensão curl não foi encontrada. Não sendo um problema crítico poderá causar dificuldades a alguns módulos de terceiros';
$lang['fail_database_support'] = 'Não foram encontrados drivers de base de dados compatíveis';
$lang['fail_file_get_contents'] = 'A função file_get_contents não existe, ou encontra-se desabilitada. CMSMS não pode continuar (inclusivamente o própio instalador poderá falhar)';
$lang['fail_file_uploads'] = 'A capacidade de carregar ficheiros para o servidor estão desactivadas neste ambiente. Diversas funções do CMSMS não irão funcionar neste ambiente';
$lang['fail_func_json'] = 'funcionalidade json não detectada';
$lang['fail_func_gzopen'] = 'funcionalidade gzopen não detectada';
$lang['fail_func_md5'] = 'funcionalidade md5 não detectada';
$lang['fail_func_tempnam'] = 'A função tmpnam não existe. É uma função requerida para o funcionamento do CMSMS';
$lang['fail_ini_set'] = 'Aparentemente não é possível alterar as configurações ini. Poderá causar problemas a módulos de terceiros (ou ao habilitar o modo de depuração)';
$lang['fail_magic_quotes_runtime'] = 'Aparentemente a directiva magic quotes está habilitada nesta configuração. Por favor desabilite-a e tente de novo';
$lang['fail_max_execution_time'] = 'O tempo máximo de execução corrente de %s não chega ao valor mínimo de %s. Recomenda-se que aumente esse valor para %s ou superior';
$lang['fail_memory_limit'] = 'O seu valor de limite de memoria é demasiado baixo. Foi detectado %s, no entanto é requerido um mínimo de %s, e recomendado %s';
$lang['fail_multibyte_support'] = 'O suporte a multibyte não de encontra habilitado nesta configuração';
$lang['fail_output_buffering'] = 'O output buffering não de encontra habilitado';
$lang['fail_open_basedir'] = 'Estão em efeito restrições de open basedir. O CMSMS requer que estas restrições se encontrem desabilitadas';
$lang['fail_php_version'] = 'A versão de PHP disponível é extremamente importante para o funcionamento do CMSMS. A versão mínima aceitável é %s, no entanto recomendamos %s ou maior. Foi detectada %s';
$lang['fail_post_max_size'] = 'O tamanho máximo de post encontrado, %s, não chega ao valor mínimo de %s. Deverá ser aumentado para %s. Assegure-se de que este valor seja superior ao upload_max_filesize';
$lang['fail_pwd_writable2'] = 'O processo HTTP necessita de conseguir escrever no directório de destino (e em todos os directórios e ficheiros que lhe são interiores) para poder instalar ficheiros. O instalador não tem permissão de escrita de (pelo menos) %s';
$lang['fail_register_globals'] = 'Por favor desabilite o register globals na sua configuração de PHP';
$lang['fail_remote_url'] = 'Foram encontrados problemas na ligação a um URL remoto. Estes irão limitar alguma da funcionalidade do CMS Made Simple';
$lang['fail_safe_mode'] = 'O CMSMS não irá operar adequadamente num ambiente aonde o safe mode esteja habilitado. Note que o safe mode foi marcado como obsoleto ao ser considerado um mecanismo falhado, e será removido em versões futuras do PHP';
$lang['fail_session_save_path_exists'] = 'O valor da variável session save path não é válido ou o directório não existe';
$lang['fail_session_save_path_writable'] = 'O directório session save path não é escrevível';
$lang['fail_session_use_cookies'] = 'As sessões NÃO estão configuradas para o uso de cookies';
$lang['fail_tmpfile'] = 'A função de sistema tmpfile() não está a funcionar. Esta função é necessária para permitir a extracção de ficheiros dos arquivos. O argumento de URL opcional TMPDIR pode ser usado para especificar um directório com permissões de escrita. Consulte o ficheiro README que deverá estar incluído neste directório.';
$lang['fail_xml_functions'] = 'A extensão XML não foi encontrada. Por favor habilite-a no seu ambiente PHP';
$lang['failed'] = 'falhou';
$lang['file_get_contents'] = 'A testar a função file_get_contents';
$lang['file_installed'] = '%s Instalado';
$lang['file_uploads'] = 'Verificação de suporte de upload de ficheiros';
$lang['finished_custom_freshen_msg'] = 'A instalação corrente foi refrescada! Os ficheiros do núcleo foram actualizados e foi criado um novo ficheiro config. Por favor visite o seu website para se certificar de que tudo está a funcionar correctamente.';
$lang['finished_custom_install_msg'] = 'Woot! Acabámos. Por favor visite o seu website e dê entrada no painel Admin';
$lang['finished_custom_upgrade_msg'] = 'Woot! Está tudo finalizado. Por favor viste o Painel Admin, e o lado público do seu site para certificar-se de que está tudo a funcionar adequadamente. <br/><strong>Sugestão:</strong> esta é uma boa altura para fazer outra cópia de segurança.';
$lang['finished_freshen_msg'] = 'A instalação corrente foi refrescada! Os ficheiros do núcleo foram actualizados e foi criado um novo ficheiro config.  Já pode <a href="%s">visitar o seu website</a> ou <a href="%s">dar entrada no painel admin do CMSMS</a>.';
$lang['finished_install_msg'] = 'Woot! Acabámos. Já pode <a href="%s">visitar o seu website</a> ou <a href="%s">dar entrada no painel admin do CMSMS</a>.';
$lang['finished_upgrade_msg'] = 'Woot! Está tudo finalizado. Por favor  <a href="%s">visite o seu site</a>, e o <a href="%s">Painel Admin</a> para certificar-se de que está tudo a funcionar adequadamente. Poderá ainda ser necessária a actualização de alguns módulos de terceiros. <br/><strong>Pista:</strong> esta é uma boa altura para fazer outra cópia de segurança.';
$lang['freshen'] = 'Refrescar (reparar)';
$lang['func_json'] = 'Verificação de funcionalidade de codificação e descodificação json';
$lang['func_md5'] = 'Verificação de funcionalidade md5';
$lang['func_tempnam'] = 'Verificação de função tempnam';
$lang['func_gzopen'] = 'Verificação de função gzopen';
$lang['gd_version'] = 'Versão GD';
$lang['goback'] = 'Voltar';
$lang['info_addlanguages'] = 'Seleccionar linguagens (para além do Inglês) a instalar. Nota: nem todas as traduções estão completas.';
$lang['info_adminaccount'] = 'Por favor especifique as credenciais para a conta inicial de administrador. Esta conta terá acesso a toda a funcionalidade da consola de admin do CMSMS.';
$lang['info_advanced'] = 'O modo avançado habilita mais opções no processo de instalação.';
$lang['info_dbinfo'] = 'O CMS Made Simple guarda uma quantidade considerável de dados na base de dados. Uma ligação a uma base de dados é mandatória. Adicionalmente, as credenciais que fornecer deverão ter TODOS OS PRIVILÉGIOS para a base de dados especificada de forma a ser possível criar, apagar e modificar tabelas, indexes e views.';
$lang['info_errorlevel_edeprecated'] = 'E_DEPRECATED é uma flag da directiva de PHP error reporting que indica que devem ser emitidos avisos (mensagens Warning) quando o código de programação usa técnicas obsoletas. Apesar do núcleo do CMSMS tentar assegurar tanto quanto possível que estas técnicas não são usadas, alguns módulos poderão não cumprir este standard. É recomendado que se desabilite esta configuração PHP';
$lang['info_errorlevel_estrict'] = 'E_STRICT é uma flag da directiva de PHP error reporting que indica quando os standards estritos de programação devem ser respeitados. Apesar do núcleo do CMSMS estar em conformidade com os standards E_STRICT tanto quanto possível, alguns módulos poderão não cumprir este standard. É recomendado que se desabilite esta configuração PHP';
$lang['info_installcontent'] = 'Por defeito este instalador irá criar uma série de páginas de exemplo, folhas de estilo e templates nesta instalação do CMSMS. Este conteúdo de exemplo providencia informação extensiva bem como pistas para ajudar à construção de sites com o CMSMS e é de leitura recomendada e útil. No entanto se já estiver familiarizado com o CMS Made Simple, ao desabilitar esta opção estará a criar apenas um conjunto mínimo de templates, folhas de estilo, e páginas de conteúdo.';
$lang['info_open_basedir_session_save_path'] = 'A directiva open_basedir está habilitada na sua configuração de PHP. Não nos foi possível testar as capacidades de sessão de forma apropriada. Contudo, ter chegado a este ponto da instalação indica que, com toda a probabilidade, as sessões estarão a funcionar correctamente.';
$lang['info_pwd_writable'] = 'Esta aplicação necessita de permissão de escrita no directório de trabalho corrente';
$lang['info_queryvar'] = 'A variável de query é usada internamente pelo CMSMS para indentificar a página requerida. Na maioria das circunstâncias não deverá ser necessário ajustar esta entrada.';
$lang['info_sitename'] = 'O nome do website é usado nos templates pré-configurados com parte do título. Por favor dê ao site um nome que seja inteligível';
$lang['info_timezone'] = 'A informação de fuso horário é necessária aos cálculos e usos de data/hora no site. Por favor seleccione o fuso horário do servidor.';
$lang['ini_set'] = 'A testar se é possível modificar configurações INI';
$lang['install'] = 'Instalar';
$lang['install_attachstylesheets'] = 'Anexar folhas de estilo a temas';
$lang['install_backupconfig'] = 'A fazer cópia de segurança do ficheiro config';
$lang['install_created_index'] = 'Criados índices %s ... %s';
$lang['install_create_tables'] = 'Criar tabelas de base de dados';
$lang['install_createconfig'] = 'Criar novo ficheiro config';
$lang['install_createcontentpages'] = 'Criar páginas de conteúdo pré-definidas';
$lang['install_created_table'] = 'Foi criada a tabela  %s: .... %s';
$lang['install_createtablesindexes'] = 'A criar tabelas e indexes';
$lang['install_createtmpdirs'] = 'A criar directórios temporários';
$lang['install_creating_index'] = 'Criado índice %s';
$lang['install_default_collections'] = 'Instalar colecções pré-definidas';
$lang['install_defaultcontent'] = 'Instalar conteúdo pré-definido';
$lang['install_detectlanguages'] = 'Detectar idiomas instalados';
$lang['install_dropping_tables'] = 'A apagar tabelas';
$lang['install_dummyindexhtml'] = 'Criar ficheiros index.html fictícios';
$lang['install_extractfiles'] = 'Extrair ficheiros do arquivo';
$lang['install_initevents'] = 'Criar eventos';
$lang['install_initsitegroups'] = 'Criar grupos iniciais';
$lang['install_initsiteperms'] = 'Definir permissões iniciais';
$lang['install_initsiteprefs'] = 'Definir preferências de site iniciais';
$lang['install_initsiteusers'] = 'criar conta inicial de utilizador';
$lang['install_initsiteusertags'] = 'UDT\'s (user defined tags) iniciais';
$lang['install_module'] = 'Instalar o módulo %s';
$lang['install_modules'] = 'Instalar módulos disponíveis';
$lang['install_passwordsalt'] = 'Definir sal de senhas';
$lang['install_requireddata'] = 'Definir os dados iniciais requeridos';
$lang['install_schema'] = 'Criar schema da base de dados';
$lang['install_setschemaver'] = 'Definir versão do schema';
$lang['install_setsequence'] = 'Reiniciar sequências das tabelas';
$lang['install_setsitename'] = 'Definir o nome do site';
$lang['install_stylesheets'] = 'Criar folhas de estilo pré-definidas';
$lang['install_templates'] = 'Criar templates pré-definidos';
$lang['install_templatetypes'] = 'Criar tipos standard de templates';
$lang['install_update_sequences'] = 'Actualizar as tabelas de sequências';
$lang['install_updatehierarchy'] = 'Actualizar posições hierárquicas de conteúdo';
$lang['install_updateseq'] = 'Actualizar a sequência de %s';
$lang['installer_ver'] = 'Versão do instalador';
$lang['legend'] = 'Legenda';
$lang['magic_quotes_runtime'] = 'Assegurar que as magic quotes estão desabilitadas';
$lang['max_execution_time'] = 'Verificação de tempo máximo de execução de um script PHP';
$lang['meaning'] = 'Significado';
$lang['memory_limit'] = 'Verificação de limite de memória PHP suficiente';
$lang['msg_clearedcache'] = 'A cache do servidor foi limpa';
$lang['msg_configsaved'] = 'O ficheiro config existente foi guardado em %s';
$lang['msg_upgrade_module'] = 'A actualizar o módulo %s';
$lang['msg_upgrademodules'] = 'Actualização de módulos';
$lang['msg_yourvalue'] = 'Detectou-se: %s';
$lang['multibyte_support'] = 'Verificação de suporte multibyte';
$lang['next'] = 'Seguinte';
$lang['no'] = 'Não';
$lang['none'] = 'Nenhum';
$lang['open_basedir'] = 'Restrições open_basedir';
$lang['open_basedir_session_save_path'] = 'A directiva open_basedir está habilitada. Não é possível testar o directório de sessão (session save path)';
$lang['output_buffering'] = 'Assegurar que o output buffering está abilitado';
$lang['pass_config_writable'] = 'O processo HTTP tem permissões de escrita no ficheiro config.php';
$lang['pass_database_support'] = 'Foi encontrado pelo menos um driver de base de dados';
$lang['pass_func_json'] = 'funcionalidade json detectada';
$lang['pass_func_md5'] = 'funcionalidade json detectada';
$lang['pass_func_tempnam'] = 'A função tempnam existe';
$lang['pass_multibyte_support'] = 'Suporte multibite parece estar habilitado';
$lang['pass_php_version'] = 'A versão de PHP configurada neste momento não está de acordo com os requerimentos mínimos. No mínimo a versão PHP %s é requerida, embora seja recomendada %s ou superior';
$lang['pass_pwd_writable'] = 'O processo HTTP não consegue escrever no directório de destino. Necessário à extracção dos ficheiros';
$lang['password'] = 'Senha';
$lang['ph_sitename'] = 'Digite um nome para o site';
$lang['php_version'] = 'Versão de PHP';
$lang['post_max_size'] = 'Verificação do valor máximo de dados que é possível usar num request';
$lang['prompt_addlanguages'] = 'Linguagens adicionais';
$lang['prompt_createtables'] = 'Criar Tabelas da Base de Dados';
$lang['prompt_dbhost'] = 'Nome do Host da Base de Dados';
$lang['prompt_dbinfo'] = 'Informação da Base de Dados';
$lang['prompt_dbname'] = 'Nome da Base de Dados';
$lang['prompt_dbpass'] = 'Senha';
$lang['prompt_dbport'] = 'Número do Port da Base de Dados';
$lang['prompt_dbprefix'] = 'Prefixo dos Nomes das Tabelas da Base de Dados';
$lang['prompt_dbtype'] = 'Tipo da Base de Dados';
$lang['prompt_dbuser'] = 'Nome de Utilizador';
$lang['prompt_dir'] = 'Directório de Instalação';
$lang['prompt_installcontent'] = 'Instalar Conteúdo de Demonstração';
$lang['prompt_queryvar'] = 'Variável de Query';
$lang['prompt_sitename'] = 'Nome do Web Site';
$lang['prompt_timezone'] = 'Fuso Horário do Servidor';
$lang['pwd_writable'] = 'Directório Escrevível';
$lang['queue_for_upgrade'] = 'Próximo modulo não pertencente ao core em fila para actualização no passo seguinte: %s.';
$lang['readme_uc'] = 'LEIA-ME';
$lang['register_globals'] = 'Assegurar que o \'register globals\' está desabilitado';
$lang['remote_url'] = 'Conexões HTTP de saída';
$lang['repeatpw'] = 'Repita a senha';
$lang['reset_site_preferences'] = 'Repor algumas preferências globais';
$lang['reset_user_settings'] = 'Repor algumas preferências de utilizador';
$lang['retry'] = 'Tentar de Novo';
$lang['safe_mode'] = 'Teste para assegurar que o  \'safe mode\' está desabilitado';
$lang['saltpasswords'] = 'Salgar Senhas';
$lang['select_language'] = 'A primeira coisa que lhe vamos pedir é para seleccionar a sua preferência de idioma da lista seguinte. Esta opção será usada para melhorar a sua experiência durante esta sequência de instalação, mas não terá qualquer efeito na instalação final do CMSMS.';
$lang['send_admin_email'] = 'Enviar email com as credenciais de acesso à secção admin';
$lang['session_capabilities'] = 'Teste a existência de recursos adequados de sessão (o uso de cookies pela sessão, o directório de sessão permitir escrita, etc)';
$lang['session_save_path_exists'] = 'Session_save_path existe';
$lang['session_save_path_writable'] = 'Session_save_path tem propriedades de escrita';
$lang['session_use_cookies'] = 'Assegurar que as sessões PHP usam cookies';
$lang['sometests_failed'] = 'Foram executados uma série de testes no ambiente web corrente. Embora não tenham sido encontrados nenhuns problemas críticos, recomenda-se que os itens seguintes sejam corrigidos antes de prosseguir.';
$lang['step1_advanced'] = 'Modo Avançado';
$lang['step1_destdir'] = 'Seleccionar Directório';
$lang['step1_info_destdir'] = 'Aviso: este programa pode instalar ou actualizar mais do que uma instalação do CMS Made Simple. É importante seleccionar o directório correcto para a sua instalação ou actualização.';
$lang['step1_language'] = 'Seleccionar Linguagem';
$lang['step1_title'] = 'Seleccionar Linguagem';
$lang['step2_cmsmsfound'] = 'Foi encontrada uma instalação do CMS Made Simple. É possível actualizar esta instalação. No entanto, antes de prosseguir, assegure-se de que tem uma cópia de segurança VERIFICADA, de todos os ficheiros bem como da base de dados';
$lang['step2_cmsmsfoundnoupgrade'] = 'Embora tenha sido encontrada uma instalação do CMS Made Simple, não é possível usar esta aplicação para actualizá-la. Possivelmente é uma versão muito antiga.';
$lang['step2_confirminstall'] = 'Tem a certeza de que quer instalar o CMS Made Simple';
$lang['step2_confirmupgrade'] = 'Tem a certeza de que quer actualizar o CMS Made Simple';
$lang['step2_errorsamever'] = 'O directório seleccionado aparenta ter uma instalação do CMSMS com a mesma versão que vem incluída neste script. Continuar com este processo irá refrescar esta instalação.';
$lang['step2_errortoonew'] = 'O directório seleccionado aparenta ter uma instalação do CMSMS mais recente do que a  incluída neste script. Não é possível prosseguir.';
$lang['step2_info_freshen'] = 'Refrescar esta instalação envolve repor todos os ficheiros do núcleo e recriar a configuração. Ser-lhe-a pedida informação básica de configuração, contudo a base de dados não será tocada.';
$lang['step2_installdate'] = 'Data aproximada de instalação';
$lang['step2_hdr_upgradeinfo'] = 'Informação de versão';
$lang['step2_info_upgradeinfo'] = 'De seguida encontra as notas de lançamento e informações de modificações (changelog) disponíveis para cada versão. Os botões visíveis permitem consultar informações detalhadas sobre o que mudou em cada versão do CMS Made Simple. Poderão haver mais instruções ou avisos em cada versão que podem afectar o processo de actualização.';
$lang['step2_minupgradever'] = 'A versão mínima que esta aplicação consegue actualizar é: %s. Poderá ser necessário actualizar a sua aplicação para uma versão mais recente por estágios, e através de outro método, antes de terminar este processo de actualização. Por favor certifique-se de que tem uma cópia de segurança completa e verificada, antes de usar qualquer método de actualização.';
$lang['step2_nocmsms'] = 'Não foi encontrada nenhuma instalação do CMS Made Simple neste directório. Parece ser uma instalação nova';
$lang['step2_passed'] = 'Passado';
$lang['step2_pwd'] = 'O seu directório de trabalho actual';
$lang['step2_schemaver'] = 'Versão do Schema da Base de Dados';
$lang['step2_version'] = 'A versão detectada';
$lang['step3_failed'] = 'Esta aplicação executou numerosos testes ao ambiente PHP corrente, e um ou mais destes testes falharam. É necessário rectificar esses erros nesta configuração antes de continuar. Uma vez rectificados os erros, clique \'Tentar de Novo\' abaixo.';
$lang['step3_passed'] = 'Esta aplicação executou numerosos testes ao ambiente PHP corrente, e todos passaram com sucesso. São boas notícias. Não sendo testes conclusivos, não deverá ter nenhuma dificuldade a usar a instalação do núcleo do CMSMS.';
$lang['step9_removethis'] = '<strong>Aviso</strong> Por motivos de segurança é extremamente importante a remoção do assistente de instalação de qualquer sitio acessível publicamente no site assim que tenha verificado que a operação tenha tido sucesso.';
$lang['symbol'] = 'Símbolo';
$lang['social_message'] = 'Foi instalado o CMS Made Simple com sucesso!';
$lang['test_failed'] = 'Um teste requerido falhou';
$lang['test_passed'] = 'Um teste passou (testes bem sucedidos só são visíveis no modo avançado)';
$lang['test_warning'] = 'Uma configuração está acima do valor mínimo requerido, mas abaixo do valor recomendado, ou... Um recurso, que pode ser requerido para uma funcionalidade opcional, não está disponível';
$lang['th_status'] = 'Estado';
$lang['th_testname'] = 'Teste';
$lang['th_value'] = 'Valor';
$lang['title_error'] = 'Houston, temos um problema!';
$lang['title_step2'] = 'Passo 2 - Detectar software existente';
$lang['title_step3'] = 'Passo 3 - Testes';
$lang['title_step4'] = 'Passo 4 - Informações Básicas de Configuração';
$lang['title_step5'] = 'Passo 5 - Informações de Conta de Administração';
$lang['title_step6'] = 'Passo 6 - Configurações do Site';
$lang['title_step7'] = 'Passo 7 - Instalar Ficheiros da Aplicação';
$lang['title_step8'] = 'Passo 8 - Procedimentos da Base de Dados';
$lang['title_step9'] = 'Passo 9 - Finalização';
$lang['title_welcome'] = 'Bem-vindo';
$lang['title_forum'] = 'Fórum de Apoio';
$lang['title_docs'] = 'Documentação Oficial';
$lang['title_api_docs'] = 'Documentação Oficial do API';
$lang['to'] = 'ao';
$lang['title_share'] = 'Partilhe a sua experiência com os seus amigos.';
$lang['tmpfile'] = 'Verificação de mpfile() funcional';
$lang['upgrade'] = 'Actualizar';
$lang['upgrade_deleteoldevents'] = 'A apagar eventos antigos';
$lang['upgrading_schema'] = 'A actualizar schema de base de dados';
$lang['upload_max_filesize'] = 'Verificação do tamanho máximo de upload de ficheiros';
$lang['username'] = 'Nome de Utilizador';
$lang['warn_disable_functions'] = 'Nota: uma ou mais funções PHP estão activas. Estas podem ter um impacto negativo na sua instalação do CMSMS, particularmente com módulos desenvolvidos por terceiros. Por favor vigie o ficheiro de registo de erros (error log). As funções que estão desabilitadas são: %s';
$lang['warn_max_execution_time'] = 'Apesar do tempo máximo de execução de %s exceda o valor mínimo necessário de %s, recomenda-se que aumente este valor para %s ou superior';
$lang['warn_memory_limit'] = 'O limite de memória encontrado é de %s, sendo assim acima do mínimo de %s. Recomenda-se no entanto um valor de %s';
$lang['warn_open_basedir'] = 'A directiva open_basedir está habilitada na sua configuração de PHP. Apesar de poder continuar a instalação, o CMSMS não dá suporte a utilizadores com relação a instalações em ambientes com restrições de open_basedir.';
$lang['warn_post_max_size'] = 'Apesar do tamanho máximo de post de %s exceda o valor mínimo necessário de %s, recomenda-se que aumente este valor para %s ou superior, e que este seja superior ao valor de upload_max_filesize';
$lang['warn_tests'] = 'Nota: o sucesso na passagem de todos estes testes deverá assegurar que o CMSMS funcione adequadamente na maioria dos sites. No entanto, à medida que o site cresça, e mais funcionalidades sejam adicionadas, estes valores mínimos podem-se revelar insuficientes. Adicionalmente, módulos desenvolvidos por terceiros podem requerer recursos adicionais ou com valores acima dos encontrados para funcionar adequadamente';
$lang['warn_upload_max_filesize'] = 'Embora a configuração PHP de %s de upload_max_filesize seja suficiente, recomendamos incrementar este valor para pelo menos %s';
$lang['welcome_message'] = 'Bem-vindo! Este é o Mecanismo de Instalação Automática do CMS Made Simple. Este permitir-lhe-á, de forma rápida e fácil, confirmar se o seu servidor web é compatível com o CMSMS, e instalar ou actualizar o CMS Made Simple para a versão mais recente. Temos a certeza de que o irá apreciar.';
$lang['wizard_step1'] = 'Bem-vindo';
$lang['wizard_step2'] = 'Detectar Software';
$lang['wizard_step3'] = 'Testes de Compatibilidade';
$lang['wizard_step4'] = 'Dados de Configuração';
$lang['wizard_step5'] = 'Dados de Conta Admin';
$lang['wizard_step6'] = 'Configurações do Site';
$lang['wizard_step7'] = 'Ficheiros';
$lang['wizard_step8'] = 'Configuração de Base de Dados';
$lang['wizard_step9'] = 'Finalizar';
$lang['xml_functions'] = 'A verificar a funcionalidade XML';
$lang['yes'] = 'Sim';
?>