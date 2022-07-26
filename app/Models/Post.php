<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public int $id;
    public string $title;
    public string $excerpt;
    public string $date;
    public string $body;

    public function __construct($id, $title, $excerpt, $date, $body)
    {
        $this->id = $id;
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
    }


    public static function find($id)
    {
        return static::findAll()->firstWhere('id', intval($id));
    }

    public static function findAll(): Collection
    {
        return cache()->rememberForever('posts.all', fn() => collect(File::files(resource_path() . "/posts/"))
            ->map(fn($fileInfo) => YamlFrontMatter::parse($fileInfo->getContents()))
            ->map(fn($mattered) => self::parseFromMatter($mattered))
            ->sortByDesc('date'));
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public static function parseFromMatter($mattered): Post
    {
        return new Post(
            $mattered->id,
            $mattered->title,
            $mattered->excerpt,
            $mattered->date,
            $mattered->body());
    }
}
