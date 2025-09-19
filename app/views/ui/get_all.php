<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Students List</title>
<style>
* { 
    box-sizing: border-box; 
    margin: 0; 
    padding: 0; 
    font-family: Georgia, serif; /* Force Georgia everywhere */
}
body {
    background: linear-gradient(135deg, #ffe6f0, #ff45a2ff);
    padding: 40px 20px;
    color: #333;
    min-height: 100vh;
}
h2 {
    text-align: center;
    font-size: 32px;
    margin-bottom: 35px;
    color: #ff6cb5ff;
    font-weight: 700;
}
a {
    text-decoration: none;
    color: #e75480;
    font-weight: 500;
}
a:hover { text-decoration: underline; }
p { margin-bottom: 15px; text-align: center; }

/* Container */
.container {
    max-width: 1000px;
    margin: 0 auto;
}

/* Controls */
.controls {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    gap: 10px;
}
.controls .links a {
    margin-right: 15px;
    font-weight: 600;
    color: #e75480;
}
.controls form {
    display: flex;
    gap: 10px;
}
.controls input[type="text"] {
    padding: 10px 14px;
    border: 1px solid #f8a8c1;
    border-radius: 8px;
    font-size: 15px;
    transition: all 0.3s ease;
}
.controls input[type="text"]:focus {
    border-color: #e75480;
    box-shadow: 0 0 6px rgba(231,84,128,0.4);
    outline: none;
}
.controls button[type="submit"] {
    padding: 10px 18px;
    background: linear-gradient(to right, #ff7eb3, #ff758c);
    border: none;
    border-radius: 8px;
    color: white;
    cursor: pointer;
    font-weight: 600;
    transition: all 0.3s ease;
}
.controls button[type="submit"]:hover { opacity: 0.9; }

/* Student Cards */
.student-card {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #ffffff;
    border-radius: 14px;
    padding: 18px 24px;
    margin-bottom: 18px;
    box-shadow: 0 8px 22px rgba(231,84,128,0.1);
    animation: fadeSlide 0.6s ease forwards;
    opacity: 0;
}
.student-info {
    display: flex;
    align-items: center;
    gap: 18px;
}
.student-info img {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    object-fit: cover;
}
.student-info div {
    display: flex;
    flex-direction: column;
}
.student-info div span:first-child {
    font-weight: 600;
    color: #b3127a;
}
.student-info div span:last-child {
    font-size: 14px;
    color: #555;
}
.student-actions {
    display: flex;
    gap: 8px;
}
.student-actions .btn {
    padding: 8px 14px;
    border-radius: 8px;
    font-size: 13px;
    color: white;
    font-weight: 500;
    transition: all 0.3s ease;
}
.edit { background: #ff85a2; }
.delete { background: #ff4d6d; }
.restore { background: #f39c12; }
.hard-delete { background: #c0392b; }
.edit:hover { background: #e75480; }
.delete:hover { background: #d43a55; }
.restore:hover { background: #d68910; }
.hard-delete:hover { background: #922b21; }

/* Animations */
@keyframes fadeSlide {
    0% { opacity: 0; transform: translateY(15px); }
    100% { opacity: 1; transform: translateY(0); }
}

/* Pagination */
.pagination {
    text-align: center;
    margin-top: 25px;
}
.pagination ul {
    list-style: none;
    padding: 0;
    display: inline-flex;
    gap: 8px;
}
.pagination li a,
.pagination li span {
    display: inline-block;
    padding: 8px 14px;
    border: 1px solid #f8a8c1;
    border-radius: 8px;
    color: #e75480;
    text-decoration: none;
    transition: all 0.3s ease;
}
.pagination li a:hover { background: #e75480; color: white; }
.pagination li span.active {
    background: #e75480;
    color: white;
    border: 1px solid #c93b66;
}

/* Responsive */
@media (max-width: 768px) {
    .controls { flex-direction: column; align-items: stretch; }
    .student-card { flex-direction: column; align-items: flex-start; gap: 12px; }
    .student-actions { align-self: flex-end; }
}
</style>
</head>
<body>
<h2>Students List</h2>
<div class="container">
    <div class="controls">
        <div class="links">
            <a href="/students/create">New Student</a>
            <a href="/auth/logout">Logout</a>
            <?php if (!empty($show_deleted)): ?>
                <a href="/students/get-all">Active Students</a>
            <?php else: ?>
                <a href="/students/get-all?show=deleted">Deleted Students</a>
            <?php endif; ?>
        </div>
        <form method="get" action="/students/get-all">
            <input type="hidden" name="show" value="<?= $show_deleted ? 'deleted' : 'active' ?>">
            <input type="text" name="search" placeholder="Search..." value="<?= htmlspecialchars($search ?? '') ?>">
            <input type="hidden" name="per_page" value="<?= $per_page ?>">
            <button type="submit">Search</button>
        </form>
    </div>

    <?php if (!empty($records)): ?>
        <?php foreach ($records as $r): ?>
        <div class="student-card" style="animation-delay: <?= ($r['id']*0.05) ?>s;">
            <div class="student-info">
                <?php if (!empty($r['photo'])): ?>
                    <img src="<?= $upload_url . htmlspecialchars($r['photo']) ?>" alt="Photo">
                <?php else: ?>
                    <img src="https://via.placeholder.com/60/ffcce0/fff?text=No+Photo" alt="No Photo">
                <?php endif; ?>
                <div>
                    <span><?= htmlspecialchars($r['first_name'] . ' ' . $r['last_name']) ?></span>
                    <span><?= htmlspecialchars($r['email']) ?></span>
                </div>
            </div>
            <div class="student-actions">
                <?php if (empty($show_deleted)): ?>
                    <a class="btn edit" href="/students/update/<?= $r['id'] ?>">Edit</a>
                    <a class="btn delete" href="/students/delete/<?= $r['id'] ?>" onclick="return confirm('Delete student?')">Delete</a>
                <?php else: ?>
                    <a class="btn restore" href="/students/restore/<?= $r['id'] ?>">Restore</a>
                    <a class="btn hard-delete" href="/students/hard_delete/<?= $r['id'] ?>" onclick="return confirm('Permanently delete this student?')">Hard Delete</a>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No records found.</p>
    <?php endif; ?>

    <div class="pagination">
        <?= $pagination_links ?? '' ?>
    </div>
</div>
</body>
</html>
