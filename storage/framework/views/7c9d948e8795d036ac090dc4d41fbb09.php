<?php $__env->startSection('title','Video Streaming'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header">
                    <a href="<?php echo e(route('video-gallery.create')); ?>" class="btn btn-primary bg-gradient-primary btn-sm">Create Video Gallery <i class="fa fa-plus"></i></a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <h1><?php echo e($video_gallery->title); ?></h1>

                    <video id="videoPlayer" controls width="100%" height="auto">
                        <source src="<?php echo e(route('video-gallery.stream', ['video_gallery' => $video_gallery->id])); ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        // Get the video element
        const videoPlayer = document.getElementById('videoPlayer');

        // Check if we have a stored playback time
        const storedTime = localStorage.getItem('videoTime');
        if (storedTime) {
            videoPlayer.currentTime = storedTime; // Set the playback position to the stored value
        }

        // Listen for the 'timeupdate' event to track the current playback time
        videoPlayer.addEventListener('timeupdate', function() {
            // Save the current time in localStorage every time it updates
            localStorage.setItem('videoTime', videoPlayer.currentTime);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP-8.2.4\htdocs\surjeralo\resources\views/backend/video_gallery/stream.blade.php ENDPATH**/ ?>