<script>
<?php if($graph['type'] == 'multiline'){?>

        var COLS = <?php $cols = "["; 
                        foreach($graph['cols'] as $k => $val){
                           $cols .= "'".$val."',";
                        } 
                        $cols .= "]";
                        echo $cols;
                        ?>;
        var MULTILINE_CSV = `<?php echo $graph_data['multiline'];?>`;
        

            var datas = d3.csv.parse(MULTILINE_CSV, function(data, index){
                return data;
            });

            for(x in datas){
                for(y in datas[x]){
                    datas[x][y] = +datas[x][y];
                }
            }

            var multiline_col_name = {};

            var ml_all_cols = COLS;

            for(x in ml_all_cols){

                if(x != 0){
                    multiline_col_name[ml_all_cols[x]] = {column : ml_all_cols[x]};
                }
            }

            var chart = makeLineChart(datas, COLS[0], multiline_col_name,
             {xAxis: 'Years', yAxis: 'Amount'});

            chart.bind("#chart-line1");
            chart.render();

    <?php }?>
</script>