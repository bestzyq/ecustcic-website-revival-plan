<?php
define('InSign', TRUE);

// Debug
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'config.php';

// 获取数据列表
function getFixList()
{
    $conn = new mysqli(db_host, db_user, db_pw, db_name);
    $conn->query('set names utf8');

    // 获取一个月前的时间戳
    $oneMonthAgo = strtotime('-1 month');

    $stmt = $conn->prepare('SELECT * FROM fix WHERE addtime >= ? ORDER BY `check` ASC');
    $stmt->bind_param('i', $oneMonthAgo);
    $stmt->execute();
    $result = $stmt->get_result();
    $fixList = $result->fetch_all(MYSQLI_ASSOC);

    $stmt->close();
    $conn->close();

    return $fixList;
}


// 更新记录的解决状态
function updateFixStatus($id, $status)
{
    $conn = new mysqli(db_host, db_user, db_pw, db_name);
    $conn->query('set names utf8');

    $stmt = $conn->prepare('UPDATE fix SET `check` = ? WHERE id = ?');
    $stmt->bind_param('si', $status, $id);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}

// 处理AJAX请求
if (isset($_POST['action']) && $_POST['action'] === 'updateStatus') {
    $id = $_POST['id'];
    $status = $_POST['status'];

    // 更新数据库中的状态
    updateFixStatus($id, $status);
    exit;
}

$fixList = getFixList();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>维修列表</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        h1, th, td {
            text-align: center;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // 处理点击链接事件
            $('.status-link').click(function(event) {
                event.preventDefault(); // 阻止默认的链接行为

                var link = $(this);
                var id = link.data('id');
                var status = link.data('status');
                var newStatus = (status === 'yes') ? 'no' : 'yes';

                // 发送AJAX请求更新状态
                $.ajax({
                    url: 'list.php',
                    type: 'POST',
                    data: {
                        action: 'updateStatus',
                        id: id,
                        status: newStatus
                    },
                    success: function() {
                        // 更新链接状态和文本
                        link.data('status', newStatus);
                        link.text(newStatus === 'yes' ? '已解决' : '未解决');
                    }
                });
            });
        });
    </script>
</head>
<body>
    <h1 class="mt-5 ms-5">维修列表</h1>
    <table class="table table-striped table-bordered mt-3 ms-5 me-5">
        <thead class="table-light">
            <tr>
                <th>寝室位置</th>
                <th>电脑品牌</th>
                <th>电脑型号</th>
                <th>系统版本</th>
                <th>故障描述</th>
                <th>备注</th>
                <th>姓名</th>
                <th>联系方式</th>
                <th>IP</th>
                <th>提交时间</th>
                <th>状态（点击切换）</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fixList as $fix): ?>
                <tr>
                    <td><?php echo $fix['building']; ?></td>
                    <td><?php echo $fix['brand']; ?></td>
                    <td><?php echo $fix['brandtype']; ?></td>
                    <td><?php echo $fix['system']; ?></td>
                    <td><?php echo $fix['description']; ?></td>
                    <td><?php echo $fix['note']; ?></td>
                    <td><?php echo $fix['name']; ?></td>
                    <td><?php echo $fix['contact']; ?></td>
                    <td><?php echo $fix['ip']; ?></td>
                    <td><?php echo date('Y-m-d H:i:s', $fix['addtime']); ?></td>
                    <td>
                        <a class="status-link btn <?php echo $fix['check'] === 'yes' ? 'btn-success' : 'btn-danger'; ?>" href="#" data-id="<?php echo $fix['id']; ?>" data-status="<?php echo $fix['check']; ?>">
                            <?php echo $fix['check'] === 'yes' ? '已解决' : '未解决'; ?>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>