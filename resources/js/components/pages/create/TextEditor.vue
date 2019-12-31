<template>
    <div class="editor col-auto def-text mr-auto ml-auto">
        <editor-menu-bubble :editor="editor" :keep-in-bounds="keepInBounds" v-slot="{ commands, isActive, menu }">
            <div
                class="menububble"
                :class="{ 'is-active': menu.isActive }"
                :style="`left: ${menu.left}px; bottom: ${menu.bottom}px;`"
            >

                <div
                    class="menububble__button"
                    :class="{ 'is-active': isActive.bold() }"
                    @click="commands.bold"
                >
                    <i class="material-icons md-18 md-light">
                        format_bold
                    </i>
                </div>

                <div
                    class="menububble__button"
                    :class="{ 'is-active': isActive.italic() }"
                    @click="commands.italic"
                >
                    <i class="material-icons md-18 md-light">
                        format_italic
                    </i>
                </div>

                <div
                    class="menububble__button"
                    :class="{ 'is-active': isActive.heading({ level: 2 }) }"
                    @click="commands.heading({ level: 2 })"
                >
                    <i class="material-icons material-icons md-18 md-light">
                        text_fields
                    </i>
                </div>
                <div
                    class="menububble__button"
                    :class="{ 'is-active': isActive.heading({ level: 3 }) }"
                    @click="commands.heading({ level: 3 })"
                >
                    <i class="material-icons material-icons md-14 md-light">
                        text_fields
                    </i>
                </div>
                <div
                    class="menububble__button"
                    :class="{ 'is-active': isActive.bullet_list() }"
                    @click="commands.bullet_list"
                >
                    <i class="material-icons material-icons md-18 md-light">
                        format_list_bulleted
                    </i>
                </div>
            </div>
        </editor-menu-bubble>

        <editor-content class="editor__content" :editor="editor" />
        <button @click="check">press</button>
    </div>
</template>

<script>
    import Icon from './Icon'
    import { Editor, EditorContent, EditorMenuBubble } from 'tiptap'
    import {
        Blockquote,
        BulletList,
        CodeBlock,
        HardBreak,
        Heading,
        ListItem,
        OrderedList,
        TodoItem,
        TodoList,
        Bold,
        Code,
        Italic,
        Link,
        Strike,
        Underline,
        History,
    } from 'tiptap-extensions'
    export default {
        components: {
            EditorContent,
            EditorMenuBubble,
            Icon,
        },
        data() {
            return {
                keepInBounds: true,
                editor: new Editor({
                    extensions: [
                        new Blockquote(),
                        new BulletList(),
                        new CodeBlock(),
                        new HardBreak(),
                        new Heading({ levels: [1, 2, 3] }),
                        new ListItem(),
                        new OrderedList(),
                        new TodoItem(),
                        new TodoList(),
                        new Link(),
                        new Bold(),
                        new Code(),
                        new Italic(),
                        new Strike(),
                        new Underline(),
                        new History(),
                    ],
                    content: `
          <h3>
            Express the details
          </h3>
        `,        onUpdate: ({ getHTML }) => {
                        this.html = getHTML();
                        this.$emit('bodyChange',this.html);
                    },
                }),
            }
        },
        methods: {
            check() {
                console.log(this.html);
            }
        },
        beforeDestroy() {
            this.editor.destroy()
        },
    }
</script>
<style lang="scss">


</style>
