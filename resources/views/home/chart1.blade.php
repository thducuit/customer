<div class="col-md-12">
    <canvas id="chart-category" width="300" height="120"></canvas>
</div>
<div class="col-md-12">
    <table class="table table-bordered table-chart-category">
        <thead>
            <tr>
                <td></td>
                @for($i = 1; $i<13; $i++)
                <td>{{ sprintf("T%s", $i) }}</td>
                @endfor
                <td><strong>Sum</strong></td>
            </tr>
        </thead>
        <tbody>
            @php
                $total_by_rows = [];
                $total_sum = 0;
                for($i = 0; $i < 12; $i++) $total_by_rows[$i] = 0;
            @endphp
            @foreach($table1 as $dataset)
            <tr>
                @php
                    $total_by_col = 0; 
                @endphp
                <td>{{ $dataset['label'] }}</td>
                @for($i = 0; $i<12; $i++)
                @php 
                    $total_by_col += $dataset['data'][$i]; 
                    $total_by_rows[$i] = isset($total_by_rows[$i]) ? $total_by_rows[$i] : 0;
                    $total_by_rows[$i] = $total_by_rows[$i] + $dataset['data'][$i];
                @endphp
                <td>{{ $dataset['data'][$i] }}</td>
                @endfor
                <td><strong>{{ $total_by_col }}</strong></td>
            </tr>
            @php
                $total_sum += $total_by_col;
            @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td>Sum</td>
                @for($i = 0; $i<12; $i++)
                <td><strong>{{ $total_by_rows[$i] }}</strong></td>
                @endfor
                <td><strong>{{ $total_sum }}</strong></td>
            </tr>
        </tfoot>
    </table>
</div>