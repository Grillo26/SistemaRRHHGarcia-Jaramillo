<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
  <div class="row">

    <!--item total producciones-->
    <div class="col-sm-6 col-lg-3">
      <div class="card">
        <div class="card-body">
          <div class="text-value">89.9%</div> <!--Warning , info, danger-->
          <div>Producción</div>
          <div class="progress progress-xs my-2">
            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
          </div><small class="text-muted">Total de producciones en el mes de mayo</small>
        </div>
      </div>
    </div>

    <!--item total producciones-->
    <div class="col-sm-6 col-lg-3">
      <div class="card">
        <div class="card-body">
          <div class="text-value">89.9%</div> <!--Warning , info, danger-->
          <div>Producción</div>
          <div class="progress progress-xs my-2">
            <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
          </div><small class="text-muted">Total de producciones en el mes de mayo</small>
        </div>
      </div>
    </div>

    <!--item total producciones-->
    <div class="col-sm-6 col-lg-3">
      <div class="card">
        <div class="card-body">
          <div class="text-value">89.9%</div> <!--Warning , info, danger-->
          <div>Producción</div>
          <div class="progress progress-xs my-2">
            <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
          </div><small class="text-muted">Total de producciones en el mes de mayo</small>
        </div>
      </div>
    </div>

    <!--item total producciones-->
    <div class="col-sm-6 col-lg-3">
      <div class="card">
        <div class="card-body">
          <div class="text-value">89.9%</div> <!--Warning , info, danger-->
          <div>Producción</div>
          <div class="progress progress-xs my-2">
            <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
          </div><small class="text-muted">Total de producciones en el mes de mayo</small>
        </div>
      </div>
    </div>

    <!--CHARTS ESTADISTICA-->
    <div class="container">
      <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Line Series</h3>
                </div>
                <div class="panel-body">
                    <div id="chart1"></div>
                </div>
            </div> 
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Polar Series</h3>
                </div>
                <div id="chart2" class="panel-body">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Area Series</h3>
                </div>
                <div class="panel-body">
                    <div id="chart3"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>StepLine Series</h3>
                </div>
                <div id="chart4" class="panel-body">
                </div>
            </div>
        </div>
    </div>   
</div>

<!-- you need to include the shieldui css and js assets in order for the charts to work -->
<link rel="stylesheet" type="text/css" href="https://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
<script type="text/javascript" src="https://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>

<script type="text/javascript">
    jQuery(function ($) {
        var data1 = [30, 3, 4, 2, 12, 3, 4, 17, 22, 34, 54, 67];
        var data2 = [3, 9, 12, 14, 22, 32, 45, 12, 67, 45, 55, 7];
        var data3 = [23, 19, 11, 134, 242, 352, 435, 22, 637, 445, 555, 57];
        var data4 = [13, 19, 112, 114, 212, 332, 435, 132, 67, 45, 55, 7];
            
        $("#chart1").shieldChart({
            exportOptions: {
                image: false,
                print: false
            },
            axisY: {
                title: {
                    text: "Break-Down for selected quarter"
                }
            },
            dataSeries: [{
                seriesType: "line",
                data: data1
            }]
        });

        $("#chart2").shieldChart({
            exportOptions: {
                image: false,
                print: false
            },
            axisY: {
                title: {
                    text: "Break-Down for selected quarter"
                }
            },
            dataSeries: [{
                seriesType: "polarbar",
                data: data2
            }]
        });

        $("#chart3").shieldChart({
            exportOptions: {
                image: false,
                print: false
            },
            axisY: {
                title: {
                    text: "Break-Down for selected quarter"
                }
            },
            dataSeries: [{
                seriesType: "area",
                data: data3
            }]
        });

        $("#chart4").shieldChart({
            exportOptions: {
                image: false,
                print: false
            },
            axisY: {
                title: {
                    text: "Break-Down for selected quarter"
                }
            },
            dataSeries: [{
                seriesType: "stepline",
                data: data4
            }]
        });
    });
</script>
            </div>
</div>
