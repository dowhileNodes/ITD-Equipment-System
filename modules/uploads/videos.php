<!--update the logic where the uploaded videos to be saved: C:\ITD Inhouse folders\videos-->
<?php
session_start();

require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../config/authentication.php';

/* DELETE VIDEO (admin only) */
if (isset($_GET['delete']) && $_SESSION['role'] === 'admin') {
    $id = intval($_GET['delete']);

    $stmt = $conn->prepare("SELECT video_file FROM videos WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    if ($result) {
        $filePath = $result['video_file']; // full path stored in DB
        if (file_exists($filePath)) unlink($filePath);

        $stmt = $conn->prepare("DELETE FROM videos WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    header("Location: videos.php");
    exit;
}


require_once __DIR__ . '/../../includes/navbar.php';

/* FETCH VIDEOS */
$stmt = $conn->prepare("SELECT * FROM videos ORDER BY id DESC");
$stmt->execute();
$videos = $stmt->get_result();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Video Library</title>
    <style>
        body { font-family: Arial, sans-serif; background: #111; color: white; margin:0; padding:0; }
        .container { width: 90%; margin: auto; padding: 20px 0; }
        h2 { margin-bottom: 20px; }
        .video-item { display: flex; gap: 20px; background: #222; padding: 15px; margin-bottom: 20px; border-radius: 10px; align-items: flex-start; }
        video { width: 320px; border-radius: 10px; }
        button { background: red; color: white; border: none; padding: 8px 12px; cursor: pointer; border-radius: 6px; }
        form input, form textarea { width: 100%; padding: 8px; margin-bottom: 10px; border-radius: 6px; border: 1px solid #444; background: #222; color: white; }
        form button { width: 100%; background: linear-gradient(45deg,#fd9002,#ffb347); border:none; padding:12px; font-weight:bold; cursor:pointer; color:white; }
        form button:hover { opacity:0.9; }
        #progressWrapper { width:100%; background:#444; margin-top:10px; border-radius:6px; }
        #progressBar { width:0%; height:20px; background:green; border-radius:6px; }
        .slider { width: 800px; height: 420px; margin: 20px auto 40px auto; position: relative; overflow: hidden; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.5); }
        .slider img { width:100%; height:100%; object-fit:cover; position:absolute; opacity:0; transition:0.6s ease-in-out; }
        .slider img.active { opacity:1; }
        .content { flex:1; padding:40px 60px; }
    </style>
</head>
<body>
<div class="content">

    <!-- Slider -->
    <div class="slider">
        <img src="yt1.jpg" class="active">
        <img src="yt2.jpg">
        <img src="yt3.jpg">
    </div>

    <div class="container">

        <!-- Upload Form (Admin only) -->
        <?php if ($_SESSION['role'] === 'admin'): ?>
            <h2>Upload Video</h2>
            <form id="uploadForm" enctype="multipart/form-data">
                <input type="text" name="title" placeholder="Title" required>
                <textarea name="description" placeholder="Description"></textarea>
                <input type="file" name="video_file" accept="video/*" required>
                <button type="submit">Upload</button>
            </form>

            <div id="progressWrapper">
                <div id="progressBar"></div>
            </div>

            <hr>
        <?php endif; ?>

        <!-- Video List -->
        <h2>Videos</h2>
        <?php while($row = $videos->fetch_assoc()): ?>
            <div class="video-item">
               <video controls>
    <source src="/videos/<?php echo basename($row['video_file']); ?>" type="video/mp4">
</video>
                <div>
                    <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                    <p><?php echo htmlspecialchars($row['description']); ?></p>

                    <?php if ($_SESSION['role'] === 'admin'): ?>
                        <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete this video?')">
                            <button>Delete</button>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?>

    </div>
</div>

<script>
const form = document.getElementById("uploadForm");
if (form) {
    form.addEventListener("submit", function(e){
        e.preventDefault();
        let formData = new FormData(this);
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "upload.php", true);

        xhr.upload.onprogress = function(e){
            if(e.lengthComputable){
                let percent = (e.loaded / e.total) * 100;
                document.getElementById("progressBar").style.width = percent + "%";
            }
        };

        xhr.onload = function(){
            if(xhr.status === 200){
                alert(xhr.responseText);
                location.reload();
            } else {
                alert("Upload failed!");
            }
        };

        xhr.send(formData);
    });
}

// Slider auto
const slides = document.querySelectorAll(".slider img");
let index=0;
setInterval(()=>{
    slides[index].classList.remove("active");
    index=(index+1)%slides.length;
    slides[index].classList.add("active");
},3000);
</script>
</body>
</html>