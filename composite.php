<?php declare(strict_types=1);

/**
 * Interface Renderable
 */
interface Renderable
{
    public function render();
}

/**
 * Class Layout
 */
class Layout implements Renderable
{
    private array $elements;

    public function render()
    {
        $pageCode = null;

        foreach ($this->elements as $element) {
            $pageCode .= $element->render();
        }
        return $pageCode;
    }

    public function addPageElement(Renderable $element)
    {
        $this->elements[] = $element;
    }
}

/**
 * Class PageHeader
 */
class PageHeader implements Renderable
{
    public string $pageTitle;

    public function __construct($pageTitle)
    {
        $this->pageTitle = $pageTitle;
    }

    public function render(): string
    {
        return '<h1>' . $this->pageTitle . '</h1>';
    }
}

/**
 * Class PageBox
 */
class PageBox implements Renderable
{
    private string $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function render()
    {
        return '<div>' . $this->content . '</div>';
    }
}

/**
 * Class PageFooter
 */
class PageFooter implements Renderable
{
    public string $copyright;

    public function __construct($copyright)
    {
        $this->copyright = $copyright;
    }

    public function render(): string
    {
        return '<h4>' . $this->copyright . '</h4>';
    }
}

$layout = new Layout();
$layout->addPageElement(new PageHeader('This is header'));
$layout->addPageElement(new PageBox('This is first box'));
$layout->addPageElement(new PageBox('This is second box'));
$layout->addPageElement(new PageFooter('Copyright by Composite Pattern'));
var_dump($layout->render());