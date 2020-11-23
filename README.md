# form
 easy use and  no framework dependencies library to generate form html in your php project

**Quick use:**
```
    <?php
        \mgckid\form\Form::getInstance()
            ->form_id('test')
            ->form_class('test')
            ->form_action('/')
            ->form_method('post')
            ->input_hidden('id', 1)
            ->input_text('user name', '', 'user', 'admin')
            ->input_password('password', '', 'password', '123456')
            ->radio('is active', '', 'is_active', [
                ['value' => '1', 'name' => 'active'],
                ['value' => '0', 'name' => 'unactive']
            ], 1)
            ->switchs('is active', '', 'active', [
                ['value' => '1', 'name' => 'active'],
                ['value' => '0', 'name' => 'unactive']
            ], 1)
            ->checkbox('user role', '', 'role', [
                ['value' => '1', 'name' => 'boss'],
                ['value' => '2', 'name' => 'manager'],
                ['value' => '3', 'name' => 'employee'],
            ], '1,2')
            ->textarea('user desc', '', 'desc', 'hello,My nick is mgckid,I has 10 years work experience')
            ->select('user department', '', 'department', [
                ['value' => '1', 'name' => 'sales'],
                ['value' => '2', 'name' => 'hr'],
                ['value' => '3', 'name' => 'secured'],
            ], 1);
        ?>
        
        <div class="layuimini-container">
            <div class="layuimini-main">
                <?= \mgckid\form\Form::getInstance()->create() ?>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="autoform">submit</button>
                        <button type="reset" class="layui-btn layui-btn-primary">reset</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
```