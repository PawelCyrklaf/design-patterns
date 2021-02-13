<?php declare(strict_types=1);

/**
 * Class Ebook
 */
class Ebook
{
    private string $title;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}

/**
 * Class EbookList
 */
class EbookList implements Countable, Iterator
{
    private array $ebookList = [];
    private int $currentIndex = 0;

    public function addEbook(Ebook $ebook)
    {
        $this->ebookList[] = $ebook;
    }

    public function removeEbook(Ebook $ebookToRemove)
    {
        foreach ($this->ebookList as $key => $ebook) {
            if ($ebook->getTitle() === $ebookToRemove->getTitle()) {
                unset($this->ebookList[$key]);
            }

        }
        $this->ebookList = array_values($this->ebookList);
    }

    public function current()
    {
        return $this->ebookList[$this->currentIndex];
    }

    public function next()
    {
        $this->currentIndex++;
    }

    public function key()
    {
        return $this->currentIndex;
    }

    public function valid()
    {
        return isset($this->ebookList[$this->currentIndex]);
    }

    public function rewind()
    {
        $this->currentIndex = 0;
    }

    public function count()
    {
        return count($this->ebookList);
    }
}
