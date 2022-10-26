<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Análise de Decisão</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}}
        </style>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div id="view1">
                        <h3>Análise de Decisão</h3>
                        <br>
                        @include('_forms.form_config')
                    </div>

                    <div id="view2" style="display: none;">
                        <h3>Análise de Decisão de <span id="text_amb"></span></h3>
                        <div style="text-align: right">
                            <button id="btn_prev" class="btn btn-info col-auto">Voltar</button>
                        </div>
                        <br>
                        @include('_forms.form_cenario_inv')
                    </div>

                    <div id="view_result" style="display: none;">
                        <h3>Resultado: Análise de Decisão de <span id="text_amb_result"></span></h3>
                        <div style="text-align: right">
                            <button id="btn_prev2" class="btn btn-info col-auto">Voltar</button>
                        </div>
                        <br>

                        <div id="amb_risco">
                            <div class="vme">
                                <h4>Valor Monetário Esperado (VME):</h4>

                                <div id="reult_vme">

                                </div>
                            </div>

                            <br>
                            <div class="poe">
                                <h4>Perda de Oportunidade Esperada (POE):</h4>

                                <div id="reult_poe">

                                </div>
                            </div>

                            <br>
                            <div class="veip">
                                <h4>Valor Esperado da Informação Perfeita (VEIP):</h4>

                                <div id="reult_veip">

                                </div>
                            </div>
                        </div>

                        <div id="amb_incerteza">
                            <div id="result_table_incerteza">

                            </div>

                            <br>
                            <div class="MaxiMax">
                                <h4>MaxiMax:</h4>

                                <div id="result_maxi_max">

                                </div>
                            </div>

                            <br>
                            <div class="MaxiMin">
                                <h4>MaxiMin:</h4>

                                <div id="result_maxi_min">

                                </div>
                            </div>

                            <br>
                            <div class="Laplace:">
                                <h4>Laplace:</h4>

                                <div id="result_laplace">

                                </div>
                            </div>

                            <br>
                            <div class="Hurwicz">
                                <h4>Hurwicz:</h4>

                                <div id="result_hurwicz">

                                </div>
                            </div>

                            <br>
                            <div class="MiniMax">
                                <h4>MiniMax:</h4>

                                <div id="result_mini_max">

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <script>
            $('#form_config').submit(function(event){
                event.preventDefault();
                $('#view1').hide();

                $('#text_amb').append($("input[type=radio][name=ambiente]:checked").val());
                $('#text_amb_result').append($("input[type=radio][name=ambiente]:checked").val());
                $('#input_ambiente').val($("input[type=radio][name=ambiente]:checked").val());
                $('#input_qnt_cenario').val($('#config_qnt_cenario').val());
                $('#input_qnt_inv').val($('#config_qnt_inv').val());

                form_generate($('#config_qnt_cenario').val(), $('#config_qnt_inv').val());

                $('#view2').show();
            });

            $('#form_submit').submit(function(event){
                event.preventDefault();
                get_result($(this).serialize());
            });

            $('#btn_prev').click(function(){
                $('#view1').show();
                $('#text_amb').empty();
                $('#text_amb_result').empty();
                $('#view2').hide();
                $('#view_result').hide();
            })

            $('#btn_prev2').click(function(){
                $('#view_result').hide();
                $('#view2').show();
            })

            function form_generate(qnt_cenario, qnt_inv) {
                html = '';

                for (i = 1; i <= qnt_cenario; i++){
                    html += `<div class="form-group" style="padding: 2px;">`;
                        html += `<input name="cenarios[]" required min="0" type="number" step="any" class="form-control" placeholder="C${i}">`;
                    html +=`</div>`;
                }

                $('#form_cenario').html(html);

                html = '';

                for (i = 1; i <= qnt_inv; i++){
                    html += `<label>Inv${i}</label>`;
                    html += '<div class="form-inline" style="padding: 2px;">';

                        for (j = 1; j <= qnt_cenario; j++){
                            html += '<div class="form-group" style="padding: 2px;">';
                                html += `<input type="number" required min="0" step="any" name="inv${i}[]" class="form-control" placeholder="Inv${i}, C${j}">`;
                            html += '</div>';
                        }

                    html += '</div>';
                }

                $('#form_inv').html(html);

            }

            function get_result(data)
            {
                $.ajax({
                    url: "{{route('api.analise.decisao')}}",
                    type: "post",
                    data: data,
                    dataType: "json",
                    success: function(response){
                        if (response['data']['ambiente'] == 'RISCO') {
                            $('#amb_incerteza').hide();
                            $('#amb_risco').show();
                            result_vme(response);
                            result_poe(response);
                            result_veip(response);
                        }else if (response['data']['ambiente'] == 'INCERTEZA') {
                            $('#amb_risco').hide();
                            $('#amb_incerteza').show();
                            all_table_incerteza(response);
                            result_maxi_max(response);
                            result_maxi_min(response);
                            result_laplace(response);
                            result_hurwicz(response);
                            result_mini_max(response);
                        }

                        $('#view2').hide();
                        $('#view_result').show();
                    }
                });
            }

            function result_vme(response)
            {
                html = '';

                html += '<table class="table">';
                    html += '<thead>';
                        html += '<th></th>';
                            for (i = 1; i <= response['data']['qnt_cenario']; i++){
                                html += `<th>C${i} (${response['data']['cenarios'][i-1]}%)</th>`;
                            }
                        html += '<th>VME</th>';
                    html += '</thead>';
                    html += '<tbody>';
                        for (i = 1; i <= response['data']['qnt_inv']; i++){
                            index = `inv${i}`;
                            html += '<tr>';
                                html += `<td><strong>Inv${i}</strong></td>`;
                                for (j = 0; j < response['data']['qnt_cenario']; j++){
                                    html += `<td>${response['data'][index][j]}</td>`;
                                }
                                html += `<td>${response['vme']['investimentos'][i-1]}</td>`;
                            html += '</tr>';
                        }
                    html += '</tbody>';
                html += '</table>';

                html += `<p><strong>Inv${response['vme']['inv_indicado']} é o mais indicado.</strong></p>`;

                $('#reult_vme').html(html);
            }

            function result_poe(response)
            {
                html = '';

                html += '<table class="table">';
                    html += '<thead>';
                        html += '<th></th>';
                        for (i = 1; i <= response['data']['qnt_cenario']; i++){
                            html += `<th>C${i} (${response['data']['cenarios'][i-1]}%)</th>`;
                        }
                    html += '</thead>';
                    html += '<tbody>';
                        for (i = 1; i <= response['data']['qnt_inv']; i++){
                            index = `inv${i}`;
                            html += '<tr>';
                                html += `<td><strong>Inv${i}</strong></td>`;
                                for (j = 0; j < response['data']['qnt_cenario']; j++){
                                    html += `<td>${response['data'][index][j]}</td>`;
                                }
                            html += '</tr>';
                        }
                    html += '</tbody>';
                html += '</table>';

                html += '<br>';

                html += '<table class="table">';
                    html += '<thead>';
                        html += '<th></th>';
                        html += `<th colspan="${response['data']['qnt_cenario']}">Custos de Oportunidade</th>`;
                        html += '<th>Perdas Ponderadas</th>';
                    html += '</thead>';
                    html += '<tbody>';
                        for (i = 1; i <= response['data']['qnt_inv']; i++){
                            index = `inv${i}`;
                            html += '<tr>';
                                html += `<td><strong>Inv${i}</strong></td>`;
                                for (j = 0; j < response['data']['qnt_cenario']; j++){
                                    html += `<td>${response['poe']['custo_oportunidade'][i][j]}</td>`;
                                }
                                html += `<td>${response['poe']['investimentos'][i-1]}</td>`;
                            html += '</tr>';
                        }
                    html += '</tbody>';
                html += '</table>';

                html += `<p><strong>Inv${response['poe']['inv_indicado']} é o mais indicado.</strong></p>`;

                $('#reult_poe').html(html);
            }

            function result_veip(response)
            {
                html = '';

                html += '<table class="table">';
                    html += '<thead>';
                        html += '<th></th>';
                            for (i = 1; i <= response['data']['qnt_cenario']; i++){
                                html += `<th>C${i} (${response['data']['cenarios'][i-1]}%)</th>`;
                            }
                        html += '<th>VME</th>';
                    html += '</thead>';
                    html += '<tbody>';
                        for (i = 1; i <= 1; i++){
                            html += '<tr>';
                                html += `<td><strong>Inv.Perf</strong></td>`;
                                for (j = 0; j < response['data']['qnt_cenario']; j++){
                                    html += `<td>${response['veip']['inv_perf'][j]}</td>`;
                                }
                                html += `<td>${response['veip']['vme_inv_perf']}</td>`;
                            html += '</tr>';
                        }
                    html += '</tbody>';
                html += '</table>';

                html += `<p><strong>VEIP = ${response['veip']['veip']}</strong></p>`;

                $('#reult_veip').html(html);
            }

            function all_table_incerteza(response)
            {
                html = '';

                html += '<table class="table">';
                    html += '<thead>';
                        html += '<th></th>';
                            for (i = 1; i <= response['data']['qnt_cenario']; i++){
                                html += `<th>C${i} (${response['data']['cenarios'][i-1]}%)</th>`;
                            }
                        html += '<th>MaxiMax</th>';
                        html += '<th>MaxiMin</th>';
                        html += '<th>Laplace</th>';
                        html += '<th>Hurwicz</th>';
                    html += '</thead>';
                    html += '<tbody>';
                        for (i = 1; i <= response['data']['qnt_inv']; i++){
                            index = `inv${i}`;
                            html += '<tr>';
                                html += `<td><strong>Inv${i}</strong></td>`;
                                for (j = 0; j < response['data']['qnt_cenario']; j++){
                                    html += `<td>${response['data'][index][j]}</td>`;
                                }
                                html += `<td>${response['maxi_max']['maxi_max'][i-1]}</td>`;
                                html += `<td>${response['maxi_min']['maxi_min'][i-1]}</td>`;
                                html += `<td>${response['laplace']['laplace'][i-1]}</td>`;
                                html += `<td>${response['hurwicz']['hurwicz'][i-1]}</td>`;
                            html += '</tr>';
                        }
                    html += '</tbody>';
                html += '</table>';

                $('#result_table_incerteza').html(html);
            }

            function result_maxi_max(response)
            {
                html = '';

                html += `<p><strong>Inv${response['maxi_max']['inv_indicado']} é o mais indicado.</strong></p>`;

                $('#result_maxi_max').html(html);
            }

            function result_maxi_min(response)
            {
                html = '';

                html += `<p><strong>Inv${response['maxi_min']['inv_indicado']} é o mais indicado.</strong></p>`;

                $('#result_maxi_min').html(html);
            }

            function result_laplace(response)
            {
                html = '';

                html += `<p><strong>Inv${response['laplace']['inv_indicado']} é o mais indicado.</strong></p>`;

                $('#result_laplace').html(html);
            }

            function result_hurwicz(response)
            {
                html = '';

                html += `<p><strong>Inv${response['hurwicz']['inv_indicado']} é o mais indicado.</strong></p>`;

                $('#result_hurwicz').html(html);
            }

            function result_mini_max(response)
            {
                html = '';

                html += '<table class="table">';
                    html += '<thead>';
                        html += '<th></th>';
                        html += `<th colspan="${response['data']['qnt_cenario']}">Custos de Oportunidade</th>`;
                        html += '<th>MAIORES</th>';
                    html += '</thead>';
                    html += '<tbody>';
                        for (i = 1; i <= response['data']['qnt_inv']; i++){
                            index = `inv${i}`;
                            html += '<tr>';
                                html += `<td><strong>Inv${i}</strong></td>`;
                                for (j = 0; j < response['data']['qnt_cenario']; j++){
                                    html += `<td>${response['mini_max']['custo_oportunidade'][i][j]}</td>`;
                                }
                                html += `<td>${response['mini_max']['maiores'][i-1]}</td>`;
                            html += '</tr>';
                        }
                    html += '</tbody>';
                html += '</table>';

                html += `<p><strong>Inv${response['mini_max']['inv_indicado']} é o mais indicado.</strong></p>`;

                $('#result_mini_max').html(html);
            }
        </script>
    </body>
</html>
