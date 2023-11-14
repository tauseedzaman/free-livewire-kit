<?php

namespace App\Livewire;

use Livewire\Component;
use Str;
use App\Models\Post as ModelsPost;

class CRUDWithModal extends Component
{
    // Public properties
    public $title;
    public $slug;
    public $posts;
    public $isModalOpen = false;
    public $postIdToDelete;

    // Validation rules
    protected $rules = [
        'title' => 'required|max:100',
    ];

    /**
     * Toggle the modal's visibility.
     */
    public function toggleModal()
    {
        $this->isModalOpen = !$this->isModalOpen;
    }

    /**
     * Update the slug when the title is updated.
     */
    public function updatedTitle()
    {
        $this->slug = Str::slug($this->title);
    }

    /**
     * Save or update a post based on the presence of postIdToUpdate.
     */
    public function save()
    {
        $this->validate();

        // Check if postIdToUpdate is set
        if ($this->postIdToUpdate) {
            $post = ModelsPost::find($this->postIdToUpdate);

            // Update the existing post
            if ($post) {
                $post->update([
                    'title' => $this->title,
                    'slug' => Str::slug($this->title),
                ]);
                $this->dispatch('success', ['message' => 'Post Updated Successfully!']);
            }
        } else {
            // Create a new post
            ModelsPost::create([
                'title' => $this->title,
                'slug' => Str::slug($this->title),
            ]);

            $this->dispatch('success', ['message' => 'Post Created Successfully!']);
        }

        // Reset properties and close the modal
        $this->title = '';
        $this->slug = '';
        $this->toggleModal();
    }

    /**
     * Set properties for editing a post and open the modal.
     *
     * @param int $postId
     */
    public function editPost($postId)
    {
        $post = ModelsPost::find($postId);
        $this->title = $post->title;
        $this->slug = $post->slug;
        $this->postIdToUpdate = $postId; // Set postIdToUpdate for updating the post
        $this->isModalOpen = true;
    }

    /**
     * Delete a post and dispatch success message.
     *
     * @param int $postId
     */
    public function deletePost($postId)
    {
        $this->postIdToDelete = $postId;
        ModelsPost::find($this->postIdToDelete)->delete();
        $this->dispatch('success', ['message' => 'Post deleted successfully.']);
    }

    /**
     * Render the Livewire component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $this->posts = ModelsPost::latest('id')->take(5)->get();
        return view('livewire.c-r-u-d-with-modal');
    }
}
