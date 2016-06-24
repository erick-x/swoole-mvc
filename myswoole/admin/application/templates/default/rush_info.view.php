<?php
echo Page_Lib::head();

//$tableKey = Config::get('key.guard');

$aServer = array('sid' => $sid, 'servers' => $servers);
$aSelect = array('selected' => $select);

//$insert_html = '<div style="float:right;"><a class="btn btn-success" id="editRushMaxRound">修改最优回合数</a></div>';
echo Page_Lib::serverForm($aServer, $aSelect, $value, $insert_html);
?>
<div class="row">
    <table class="table table-hover table-bordered table-striped" >
        <thead>
        <th>名称</th>
        <th>值</th>
        <th>操作</th>
        </thead>
        <tbody>
            <tr>
                <td>当前关卡</td>
                <td><?php echo (int) $rushBattle['cur_round']; ?></td>
                <td></td>
            </tr>
            <tr>
                <td>最优关卡</td>
                <td><?php echo (int) $rushBattle['max_round']; ?></td>
                <td><button class="btn btn-link" data-toggle="modal" data-backdrop="static" data-target="#editMaxRoundModal">修改</button></td>
            </tr>
            <tr>
                <td>重置次数</td>
                <td></td>
                <td>修改</td>
            </tr>
        </tbody>
    </table>
</div>

<?php
//$insert_html = Page_Lib::loadJs('guard');
$insert_html = '';
echo Page_Lib::footer($insert_html);
?>

<script>
    $(function() {
        $("#editMaxRoundBtn").click(function() {
            var param = $("#editMaxRoundForm").serialize();
            var url = $("#editMaxRoundForm").attr('action');
            $.ajax({
                type: 'POST',
                url: url,
                data: param,
                dataType: 'json',
                success: function(result) {
                    alert(result.msg);
                    if (result.errcode == 0) {
                        //window.location.href = window.location.href;
                        window.location.reload();
                    }
                }
            });
        });
    });
</script>

<!-- Modal BEGIN-->
<div class="modal fade" id="editMaxRoundModal" tabindex="-1" role="dialog" aria-labelledby="editMaxRoundModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="editMaxRoundModalLabel">修改最优回合数</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/rush/editMaxRound" method="POST" id="editMaxRoundForm" onsubmit="return false;">
                    <div class="form-group">
                        <label class="col-md-4 control-label">最优回合数：</label>
                        <div class="col-md-8"><input type="text" class="form-control" value="" name="maxRound"/></div>
                    </div>
                    <input type="hidden" class="form-control" value="" name="uid" value="<?php echo $uid; ?>"/>
                    <input type="hidden" class="form-control" value="" name="server" value="<?php echo $sid; ?>"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="editMaxRoundBtn">确认修改</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal END-->
