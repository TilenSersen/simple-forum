<?php
        if(isset($_GET["c"])){
            $category = Category::GetCategoryByID($_GET["c"]);
            ?>

        <div class="container">
        <?php  ?>
        <table class="table table-hover borderless">
            <thead>
            <tr class="MainRow">
                <th class="thRadius" colspan="5"><a class="TableLink" href="#">Topics</a></th>
            </tr>
            </thead>
            <tbody>
            <?php
                $allTopics = Topic::GetAllTopics($category->Category_ID);
                foreach($allTopics as $topic){
                    $Last = Topic::GetLast($topic->Topic_ID);
            ?>
               
            <tr>
            <td style="text-align:center;white-space:nowrap;padding-top: 21px; background-color:#CD5C5C;font-size:15px;"><i style="color:white"class="fa fa-file-o"></i></td>
             <td><a class="TableFirst" href="viewforum.php?t=<?php echo $topic->Topic_ID; ?>"><?php echo $topic->Topic_Name; ?></a> <br/> by <a class="LastPostLink" href="#"><?php echo $topic->Topic_Author; ?></a> » <?php echo $topic->Topic_CreationDate; ?></td>
                <td><?php echo $topic->Topic_Replies; ?> <br/> <dfn>Replies</dfn></td>
                <td><?php echo $topic->Topic_Views; ?> <br/><dfn>Views</dfn></td>
                <td>by <a class="LastPostLink" href="#"><?php echo $Last["Author"]; ?></a> <br /> <?php DateTimeFormat::Convert($Last["Date"]); ?></td>
            </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
        </div>
            <?php 
        }
            ?>
        <div class="chunk2"></div>