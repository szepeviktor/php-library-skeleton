<?php

/**
 * This file is part of ramsey/php-library-skeleton
 *
 * ramsey/php-library-skeleton is open source software: you can
 * distribute it and/or modify it under the terms of the MIT License
 * (the "License"). You may not use this file except in
 * compliance with the License.
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or
 * implied. See the License for the specific language governing
 * permissions and limitations under the License.
 *
 * @copyright Copyright (c) Ben Ramsey <ben@benramsey.com>
 * @license https://opensource.org/licenses/MIT MIT License
 */

declare(strict_types=1);

namespace Ramsey\Skeleton\Task;

/**
 * Represents a user prompt
 */
class Prompt extends Task
{
    /** @psalm-suppress PropertyNotSetInConstructor */
    private Answers $answers;

    /** @psalm-suppress PropertyNotSetInConstructor */
    private InstallQuestions $questions;

    /**
     * Sets the questions with which to prompt the user
     */
    public function setQuestions(InstallQuestions $questions): self
    {
        $this->questions = $questions;

        return $this;
    }

    /**
     * Returns the questions
     */
    public function getQuestions(): InstallQuestions
    {
        return $this->questions;
    }

    /**
     * Sets the instance to use for capturing user responses
     */
    public function setAnswers(Answers $answers): self
    {
        $this->answers = $answers;

        return $this;
    }

    /**
     * Returns user responses
     */
    public function getAnswers(): Answers
    {
        return $this->answers;
    }

    /**
     * Executes the prompt, asking the user each question
     */
    public function run(): void
    {
        $questions = $this->getQuestions();
        $answers = $this->getAnswers();
        $io = $this->getIO();

        /**
         * @var Question $question
         */
        foreach ($questions->getQuestions($io, $answers) as $question) {
            $question->ask();
        }
    }
}
