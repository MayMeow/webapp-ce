<?php

namespace Tests\Feature\Presenters;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Presenters\Markdown;

class MarkdownTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCheckBox()
    {
        $markdown = <<<EOF
- [ ] test 1
- [] test 2
- [x] test 3
    - [ ] test 4
    - [x] test 5
- [test](https://markdown.org) 6
- [x](https://markdown.org) test 7
EOF;

        $html = <<<EOF
<ul>
<li class="parsedown-task-list parsedown-task-list-open"><input type="checkbox" disabled /> test 1</li>
<li>[] test 2</li>
<li class="parsedown-task-list parsedown-task-list-close"><input type="checkbox" checked disabled /> test 3
<ul>
<li class="parsedown-task-list parsedown-task-list-open"><input type="checkbox" disabled /> test 4</li>
<li class="parsedown-task-list parsedown-task-list-close"><input type="checkbox" checked disabled /> test 5</li>
</ul></li>
<li><a href="https://markdown.org">test</a> 6</li>
<li><a href="https://markdown.org">x</a> test 7</li>
</ul>
EOF;

        $parsedown = new Markdown();
        $this->assertEquals($html, $parsedown->text($markdown));
    }
}
