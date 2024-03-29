<?php 

    require "protegido/tarefa.model.php";
    require "protegido/tarefa.service.php";
    require "protegido/conexao.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if ($acao == 'inserir') {
    
        $tarefa = new Tarefa();
        $tarefa->__set('tarefa', $_POST['tarefa']);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->create();

        header('Location: nova_tarefa.php?inclusao=1');

    } else if ($acao == 'recuperar') {

        $tarefa = new Tarefa();
        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->read();
    
    } elseif ($acao == 'atualizar') {
        
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_POST['id'])
                ->__set('tarefa', $_POST['tarefa']);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        if ($tarefaService->update()) {

            if ( isset($_GET['pag']) && $_GET['pag'] == 'index') {
                header('Location: index.php?atualizacao=sim');
            } else {
                header('Location: todas_tarefas.php?atualizacao=sim');
            }
        }
        
    } elseif ($acao == 'remover') {

        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id']);
        
        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->delete();

        if ( isset($_GET['pag']) && $_GET['pag'] == 'index') {
            header('Location: index.php?exclusao=sim');
        } else {
            header('Location: todas_tarefas.php?exclusao=sim');
        }

    } elseif ($acao == 'realizada') {
        
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id'])->__set('id_status', 2);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->realizada();

        if ( isset($_GET['pag']) && $_GET['pag'] == 'index') {
            header('Location: index.php?concluida=sim');
        } else {
            header('Location: todas_tarefas.php?concluida=sim');
        }

    }  elseif ($acao == 'pendentes') {

        $tarefa = new Tarefa();
        $tarefa->__set('id_status', 1);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->pendentes();
    }



