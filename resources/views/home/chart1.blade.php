<div class="col-md-12">
    <canvas id="chart-category" width="300" height="150"></canvas>
</div>
<div class="col-md-12">
    <table class="table table-bordered">
        <thead>
            <tr>
                <td></td>
                @for($i = 1; $i<13; $i++)
                <td>{{ sprintf("T%s", $i) }}</td>
                @endfor
                <td>Sum</td>
            </tr>
        </thead>
        <tbody>
            @php
                dump($chart1); 
            @endphp
            @foreach($chart1['datasets'] as $dataset)
            <tr>
                @php
                    $total_by_col = 0; 
                @endphp
                <td>{{ $dataset['label'] }}</td>
                @for($i = 0; $i<12; $i++)
                @php 
                    $total_by_col += $dataset['data'][$i]; 
                @endphp
                <td>{{ $dataset['data'][$i] }}</td>
                @endfor
                <td>{{ $total_by_col }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td>Sum</td>
                @for($i = 1; $i<13; $i++)
                <td></td>
                @endfor
                <td></td>
            </tr>
        </tfoot>
    </table>
</div>