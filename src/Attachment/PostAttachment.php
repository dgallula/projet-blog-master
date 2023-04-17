<?php
namespace App\Attachment;

use App\Model\Post;
use Intervention\Image\ImageManager;

class PostAttachment {

    const DIRECTORY = UPLOAD_PATH . DIRECTORY_SEPARATOR . 'posts';

    public static function upload (Post $post) {
        $image = $post->getImage();
        if (empty($image) || $post->shouldUpload() === false) {
            return;
        }
        $directory = self::DIRECTORY;
        if (file_exists($directory) === false) {
            mkdir($directory, 0777, true);
        }
        if (!empty($post->getOldImage())) {
            $formats = ['small', 'large'];
            foreach($formats as $format) {
                $oldFile = $directory . DIRECTORY_SEPARATOR . $post->getOldImage() . '_' . $format . '.jpg';
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }
            }
        }
        $filename = uniqid("", true);
        $manager = new ImageManager(['driver' => 'gd']);
        $manager
            ->make($image)
            ->fit(350, 200)
            ->save($directory . DIRECTORY_SEPARATOR . $filename . '_small.jpg');
        $manager
            ->make($image)
            ->resize(1280, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save($directory . DIRECTORY_SEPARATOR . $filename . '_large.jpg');
        $post->setImage($filename);
    }

    public static function detach (Post $post) {
        if (!empty($post->getImage())) {
            $formats = ['small', 'large'];
            foreach($formats as $format) {
                $file = self::DIRECTORY . DIRECTORY_SEPARATOR . $post->getImage() . '_' . $format . '.jpg';
                if (file_exists($file)) {
                    unlink($file);
                }
            }
        }
    }

}