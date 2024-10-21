const maxUploads = 10;

function showNextUploadField(index) {
    const container = document.getElementById('image-upload-fields');

    // 检查是否已经显示了最大数量的上传框
    if (index >= maxUploads) return;

    // 检查是否已经存在对应的上传框，避免重复生成
    if (!document.getElementById(`image-upload-${index}`)) {
        // 创建新的上传框
        const input = document.createElement('input');
        input.type = 'file';
        input.name = 'images[]';
        input.id = `image-upload-${index}`;
        input.className = 'form-control';
        input.accept = 'image/*';
        input.onchange = function () {
            previewImage(this, index);  // 图片预览
            showNextUploadField(index + 1);  // 选择图片后显示下一个上传框
        };

        // 创建对应的预览图片区域
        const preview = document.createElement('img');
        preview.id = `preview-${index}`;
        preview.style.width = '200px';
        preview.style.marginTop = '10px';
        preview.style.display = 'none';

        // 将新创建的上传框和预览区域添加到 DOM 中
        container.appendChild(input);
        container.appendChild(preview);
    }
}

function previewImage(input, index) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();

        // 当文件加载完成后展示图片
        reader.onload = function (e) {
            const preview = document.getElementById(`preview-${index}`);
            preview.src = e.target.result;
            preview.style.display = 'block';  // 显示预览
        };

        // 读取文件内容
        reader.readAsDataURL(input.files[0]);

        // 自动显示下一个上传框
        showNextUploadField(index + 1);
    }
}

// 页面加载时只显示第一个上传框
window.onload = function() {
    showNextUploadField(0);  // 初始化页面时显示第一个上传框
};
