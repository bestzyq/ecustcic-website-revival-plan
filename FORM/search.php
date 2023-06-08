<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>搜索页面</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="res/css/bootstrap.min.css">
    <style>
        .search-container {
            display: flex;
            justify-content: center;
            margin-top: 50px;
        }

        .search-container input[type="text"] {
            width: 300px;
            margin-right: 10px;
        }

        .search-container button {
            width: 80px;
        }

        .search-results {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="search-container">
            <form method="GET" action="">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="输入搜索内容" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">搜索</button>
                    </div>
                </div>
            </form>
        </div>

        <?php
        if (isset($_GET['search'])) {
            // 获取用户输入的搜索内容
            $searchTerm = $_GET['search'];

            // 构建搜索URL
            $url = 'http://127.0.0.1:8099/search?name=' . urlencode($searchTerm);

            // 发起HTTP请求并获取结果
            $response = file_get_contents($url);

            // 解析JSON格式的结果
            $result = json_decode($response, true);

            // 提取需要的信息
            $data = $result['data'];
            $musicList = array();

            foreach ($data as $item) {
                $objectId = $item['Objectid'];
                $musicLink = 'https://sharewh.chaoxing.com/share/download/' . $objectId;
                $previewLink = 'https://cloud.ananas.chaoxing.com/view/fileview?objectid=' . $objectId;
                $musicList[] = '<a href="' . $musicLink . '">' . $item['Name'] . '</a> - <a href="' . $previewLink . '">预览</a>';
            }

            // 以列表形式呈现结果
            if (count($musicList) > 0) {
                echo '<h2 class="search-results">搜索结果：</h2>';
                echo '<ul>';
                foreach ($musicList as $music) {
                    echo '<li>' . $music . '</li>';
                }
                echo '</ul>';
            } else {
                echo '<p class="search-results">没有找到相关结果。</p>';
            }
        }
        ?>
    </div>

    <script src="res/js/bootstrap.min.js"></script>
</body>
</html>
