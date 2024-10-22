const maxUploads = 10;

function showNextUploadField(index) {
    const container = document.getElementById('image-upload-fields');

    // 检查是否已经显示了最大数量的上传框
    if (index >= maxUploads) return;

    // 检查是否已经存在对应的上传框，避免重复生成
    if (!document.getElementById(`image-upload-${index}`)) {
        const group = document.createElement('div');
        group.className = 'image-upload-group';
        group.id = `upload-group-${index}`;
        group.style.position = 'relative';  // 设置为相对定位

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
        preview.style.display = 'none';  // 初始化时隐藏
        preview.style.position = 'relative';  // 预览图片设置为相对定位

        // 创建删除按钮（打叉）
        const removeButton = document.createElement('span');
        removeButton.className = 'remove-btn';
        removeButton.id = `remove-${index}`;
        removeButton.textContent = '×';
        removeButton.style.position = 'absolute';
        removeButton.style.top = '0';
        removeButton.style.right = '0';
        removeButton.style.backgroundColor = 'red';
        removeButton.style.color = 'white';
        removeButton.style.padding = '5px';
        removeButton.style.cursor = 'pointer';
        removeButton.style.display = 'none';  // 初始化时隐藏
        removeButton.onclick = function () {
            removeUploadField(index);
        };

        // 将上传框、预览图片和删除按钮添加到容器中
        group.appendChild(input);
        group.appendChild(preview);
        group.appendChild(removeButton);

        // 将新创建的上传框组添加到 DOM 中
        container.appendChild(group);
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

            // 显示删除按钮（打叉）
            const removeButton = document.getElementById(`remove-${index}`);
            removeButton.style.display = 'block';
        };

        // 读取文件内容
        reader.readAsDataURL(input.files[0]);
    }
}

// 删除上传框及其预览图片
function removeUploadField(index) {
    const group = document.getElementById(`upload-group-${index}`);
    if (group) {
        group.remove();  // 从 DOM 中移除整个上传框组
    }
}

// 页面加载时只显示第一个上传框
window.onload = function() {
    showNextUploadField(0);  // 初始化页面时显示第一个上传框
};
