<!DOCTYPE html>
<html lang="en">
    <title>Relatório</title>
    <head>
        <style>
            div.page_break + div.page_break {
                page-break-before: always;
            }

            p.linha {
                    border-top: 2px solid #000;
            }
        </style>
    </head>

    <body>
        <?php
            $img_logo = public_path()."/img/logo_home.jpg";
            $img_aluno = public_path()."/img/emblema-demolay_ico.jpg";
        ?>

        @foreach ($demolay as $dados)
            <!-- Nova Paǵina: Documento PDF -->
            <div class="page_break"></div>
            <p class="linha"></p>
            <table width='100%' height='90%' border='0'>
                <!-- Cabeçalho -->
                <tr>
                    <td height='12%'>
                        <table width='100%' height='50%' border='0'>
                            <tr>
                                <td width='30%' align='center'>
                                    <img src="<?php echo $img_logo; ?>">
                                </td>
                                <td width='50%' align='rigth'>
                                    <h1>Certificado de Frequência<h1>
                                </td>
                                <td width='20%' align='left'>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!-- Linha -->
                <tr>
                    <td height='2%'><p class="linha"></p></td>
                </tr>
                <!-- Conteúdo -->
                <tr>
                    <td height='55%' align="center">
                        <h1>
                            O Capítulo Templários do Atlântico nº 901, certifica que <br><br>
                            {{ $dados->name }} <br><br>
                            Está regular e devidamente registrado nas atividades do capítulo, assumindo um total de   <br><br>
                            <?php
                                $total = 0;
                                $faltas = 0;
                                $result = 0; 
                                foreach($frequencia as $freq){
                                    if($freq->id_user == $dados->id){
                                        $total += 1;
                                        if($freq->frequencia==0){
                                            $faltas += 1;
                                        }
                                    }
                                }
                                $result = $total - $faltas;
                                try{
                                    $fr = $result / $total * 100;
                                }catch(Exception $e){
                                    $fr = 0;
                                }
                            ?>
                                {{$fr}}%
                            <br> de presença final!
                        <h1>
                    </td>
                </tr>
                <!-- Linha -->
                <tr>
                    <td height='2%'><p class="linha"></p></td>
                </tr>
                <!-- Rodapé -->
                <tr>
                    <td height='10%' align='center'>
                        <table width='100%' height='100%' border='0'>
                            <tr>
                                <td width='20%' align="left">
                                    <img src="<?php echo $img_aluno; ?>">
                                </td>
                                <td width='50%' align='center'>
                                    <b>
                                        Capítulo Templários do Atlântico nº901
                                        <br>
                                        Rua Anibal Khury, 5583 - Shangrilá, PR, 83255-000
                                    </b>
                                </td>
                                <td width='20%' align="right">
                                    <img src="<?php echo $img_aluno; ?>">
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <p class="linha"></p>
        @endforeach
    </body>
</html>