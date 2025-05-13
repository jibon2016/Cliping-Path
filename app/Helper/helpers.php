<?php
 function handleImagesInContent($content,$dir)
{
    // Use regex to find base64 images in the content
    preg_match_all('/<img[^>]+src="data:image\/([^;]+);base64,([^"]+)"/', $content, $matches);

    // If there are matches (base64 images) found
    if (isset($matches[0]) && count($matches[0]) > 0) {
        foreach ($matches[0] as $index => $imgTag) {
            // Get the image extension (e.g., png, jpeg)
            $imageType = $matches[1][$index];

            // Check for valid image types (optional, for security)
            $allowedTypes = ['png', 'jpeg', 'jpg', 'gif', 'webp'];
            if (!in_array($imageType, $allowedTypes)) {
                continue; // Skip if the image type is not allowed
            }

            // Get the base64 encoded image data
            $imageData = base64_decode($matches[2][$index]);

            // Generate a unique filename for the image
            $imageName = time() . '_' . uniqid() . '.' . $imageType;

            // Define the file path to store the image
            $directory = public_path($dir);
            $filePath = $directory . '/' . $imageName;

            // Ensure the directory exists
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true); // Create the directory if it doesn't exist
            }

            // Save the image to the server
            $saveResult = file_put_contents($filePath, $imageData);

            if ($saveResult !== false) {
                // Replace the base64 image in the content with the new image URL
                $imageUrl = asset($dir.'/' . $imageName);
                $content = str_replace($matches[0][$index], '<img src="' . $imageUrl . '"', $content);
            } else {
                // Optionally log the error or notify if saving the image fails
                Log::error('Failed to save image: ' . $imageName);
            }
        }
    }

    return $content;
}
