<div class="col-md-12">
    <canvas id="chart-supplier" width="300" height="120"></canvas>
</div>
<div class="col-md-12">
    <table class="table table-bordered table-chart-supplier">
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
            @foreach($chart3['datasets'] as $dataset)
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
                <td>{{ $total_by_col }}</td>
            </tr>
            @php
                $total_sum += $total_by_col;
            @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td><strong>Sum</strong></td>
                @for($i = 0; $i<12; $i++)
                <td>{{ $total_by_rows[$i] }}</td>
                @endfor
                <td><strong>{{ $total_sum }}</strong></td>
            </tr>
        </tfoot>
    </table>
</div>